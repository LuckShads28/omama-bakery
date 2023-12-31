<?php

namespace App\Http\Controllers;

use App\Models\UniqueCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UniqueCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UniqueCode::all();

        return view('admin.unique_code', [
            'title' => "Data Kode Unik",
            'data' => $data
        ]);
    }

    /**
     * Generate new unique code
     */
    public function generate(Request $request)
    {
        $uniqueCode = Str::random(8);
        $uniqueCode = Str::of($uniqueCode)->upper()->value();

        UniqueCode::create([
            'code' => $uniqueCode,
        ]);

        return redirect()->route('admin.unique_code.index')->with('success', 'Berhasil generate kode unik');
    }

    /**
     * Regenerate unique code
     */
    public function regenerate(Request $request)
    {
        $data = UniqueCode::findOrFail($request->id);

        $newUniqueCode = Str::random(8);
        $newUniqueCode = Str::of($newUniqueCode)->upper()->value();

        $data->update([
            'code' => $newUniqueCode
        ]);

        return redirect()->route('admin.unique_code.index')->with('success', 'Berhasil regenerate kode unik');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = UniqueCode::findOrFail($request->code_id);

        $data->delete();

        return redirect()->route('admin.unique_code.index')->with('success', 'Kode unik berhasil dihapus');
    }

    public function use(Request $request)
    {
        $data = UniqueCode::where('code', $request->code);

        $data->update([
            'status' => 'sudah_digunakan',
            'name' => $request->name,
            'product_name' => $request->product_name,
            'wa_number' => $request->wa_number
        ]);

        return redirect()->route('unique_code')->with('success', 'Data diri berhasil dikirim. Admin akan menghubungi anda');
    }
}
