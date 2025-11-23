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
            'image' => 'nullable|image|max:5048'
        ];
        
        $messages = [
            'nama.required'      => 'Nama wajib diisi.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'kategori.required'      => 'Kategori wajib diisi.',
            'harga.required'      => 'Harga wajib diisi.',
            'image.required'      => 'Gambar wajib diisi, maksimal ukuran 5048kb.'
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
        

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/produk'), $fileName);
        }
        
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->kategori_id = $request->input('kategori');
        $produk->harga = $request->input('harga');
        
        if($request->image != null){
            $produk->gambar = $fileName;
        }
        
        $produk->save();
        return redirect()->route('produk')->with('success', 'Data Berhasil disimpan');
        
    }
    public function date(Request $request)
    {
        $id = $request->input('kategori');
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
