<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all(); 
        $kategori = Kategori::all();
        return view('produk.index', [
            'produks' => $produk,
            'kategori' => $kategori
            ]);

    }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        
        $kategori = Kategori::all();
        return view ('produk.add',[
            'kategori' => $kategori,
            'produk' => null
            ]);
        }
    
    public function store(Request $request, $id = null)
    {
        $rules = [
            'nama'   => 'required',
            'deskripsi'   => 'required',
            'kategori'   => 'required',
            'harga'   => 'required',
            // 'gambar'   => 'required',
        ];
        
        $messages = [
            'nama.required'      => 'Nama wajib diisi.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'kategori.required'      => 'Kategori wajib diisi.',
            'harga.required'      => 'Harga wajib diisi.',
            // 'gambar.required'      => 'Gambar wajib diisi.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        if (!is_null($id)) {
            $produk = Produk::findOrFail($id);
            $edit = true;
        } else {
            $produk = new Produk;  
            $edit = false;
        }
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->kategori_id = $request->input('kategori');
        $produk->harga = $request->input('harga');
        $produk->gambar = $request->input('gambar');
        
        $produk->save();
        return redirect()->route('produk')->with('success', 'Data Berhasil disimpan');
        
    }
    public function date(Request $request)
    {
        $id = $request->input('kategori');
        // $enddate = $request->input('enddate');
        // // if($startdate == null || $enddate == null){
        // //         return redirect()->route('karyawan')->with('warning', 'DATA BELUM LENGKAP');
        // //     }elseif($startdate > $enddate){
        // //         return redirect()->route('karyawan')->with('warning', 'Tangal awal harus lebih kecil dari tanggal akhir');
        // //     }else{
        //         $produk = Produk::whereBetween('tglmasuk', [$kategori])->get();
        //             $produk = Produk::query();

    // Filter kategori berdasarkan produk::where(...)
    $kategori = Kategori::all();
    if($id == null){
        $produk = Produk::all();
    }else{
       $produk = Produk::where('kategori_id', $id)->get();


    }

                    
        return view('produk.index', [
            'produks' => $produk,
            'kategori' => $kategori
            ]);

    }
         
    public function show()
    {
        //
    }
    
    public function edit($id)
    {
        $produk = Produk::find($id);
         $kategori = Kategori::all();
        return view ('produk.add', [
            'produk' => $produk,
            'kategori' => $kategori
            ]
        );
    }

    public function update(Request $request, Karyawan $produk)
    {
        //
    }

    public function destroy($id)
    {
        if ($id == null) {
            return redirect()->back();
            }
            $produk = Produk::destroy($id);
            return redirect()->route('produk')->with('success', 'Data Berhasil Dihapus');
    }
}
