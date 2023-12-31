<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('admin.categories', [
            'title' => 'Data Kategori',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories_add', [
            'title' => 'Tambah Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::findOrFail($id);

        return view('admin.categories_edit', [
            'title' => 'Edit Kategori',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $data->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Berhasil memperbarui kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Category::findOrFail($request->category_id);

        $data->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Data produk berhasil dihapus');
    }
}
