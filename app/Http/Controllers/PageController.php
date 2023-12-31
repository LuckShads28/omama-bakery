<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UniqueCode;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        $data = Product::with('category')->get();

        return view('home', [
            'title' => 'Home',
            'data' => $data,
        ]);
    }

    public function login()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public function products()
    {
        $data = Product::with('category');

        if (request('cari')) {
            $data = $data->where('name', 'LIKE', '%' . request('cari') . '%');
        }

        $data = $data->paginate(30);

        return view('products', [
            'title' => 'Produk',
            'data' => $data
        ]);
    }

    public function uniqueCode()
    {
        $code = null;
        if (request('code')) {
            $inputCode = Str::upper(request('code'));
            $code = UniqueCode::where('code', $inputCode)->where('status', 'belum_digunakan')->first();
        }

        return view('unique_code', [
            'title' => 'Kode Unik',
            'code' => $code
        ]);
    }
}
