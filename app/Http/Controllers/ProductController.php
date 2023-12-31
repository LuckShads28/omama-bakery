<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('category')->paginate(30);

        return view('admin.products', [
            'title' => 'Data Produk',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products_add', [
            'title' => 'Tambah Produk',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:products',
                'description' => 'required',
                'category_id' => 'required|numeric',
                'product_pict' => 'required|image|file',
                'price' => 'required|numeric',
            ],
            [
                'name.required' => 'Nama produk harus diisi',
                'name.unique' => 'Produk dengan nama serupa sudah ada.',
                'description.required' => 'Deskripsi produk harus diisi.',
                'category_id.required' => 'Kategori harus diisi.',
                'product_pict.required' => 'Foto produk harus diisi',
                'product_pict.image' => 'Foto produk harus berupa file gambar',
                'price.numeric' => 'Harga harus berupa nominal angka'
            ]
        );

        $validatedData['slug'] = Str::slug($request->name);

        $validatedData['product_pict'] = $request->file('product_pict')->store('foto_produk');

        Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data = Product::with('category')->where('slug', $slug)->first();

        return view('product_details', [
            'title' => $data->name,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        $categories = Category::all();

        return view('admin.products_edit', [
            'title' => 'Edit Produk',
            'data' => $data,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::findOrFail($id);
        $validatedData = $request->validate(
            [
                'name' => 'required|unique:products,name,' . $id,
                'description' => 'required',
                'category_id' => 'required|numeric',
                'product_pict' => 'nullable|image|file',
                'is_best_seller' => 'required',
                'price' => 'required|numeric',
            ],
            [
                'name.required' => 'Nama produk harus diisi',
                'name.unique' => 'Produk dengan nama serupa sudah ada.',
                'description.required' => 'Deskripsi produk harus diisi.',
                'category_id.required' => 'Kategori harus diisi.',
                'product_pict.required' => 'Foto produk harus diisi',
                'product_pict.image' => 'Foto produk harus berupa file gambar',
                'price.numeric' => 'Harga harus berupa nominal angka'
            ]
        );

        $validatedData['slug'] = Str::slug($request->name);

        if ($request->hasFile('product_pict')) {
            Storage::delete($data->product_pict);
            $validatedData['product_pict'] = $request->file('product_pict')->store('foto_produk');
        }

        $data->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Data produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Product::findOrFail($request->product_id);

        $data->delete();

        return redirect()->route('admin.products.index')->with('success', 'Data produk berhasil dihapus');
    }
}
