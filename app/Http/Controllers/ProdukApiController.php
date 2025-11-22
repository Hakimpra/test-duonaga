<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->min_harga) {
            $query->where('harga', '>=', $request->min_harga);
        }

        if ($request->max_harga) {
            $query->where('harga', '<=', $request->max_harga);
        }
        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric',
            'deskripsi'  => 'required',
            'kategori_id'  => 'required|numeric',
            'gambar' => 'nullable|string'
        ]);

        $produk = Produk::create($request->all());
  
        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk
        ], 201);
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json($produk, 200);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $produk->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk
        ], 200);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
}
