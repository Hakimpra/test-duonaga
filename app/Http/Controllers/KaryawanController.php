<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Grade;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', [
            'karyawans' => $karyawan
            ]);

    }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        
        $invoice = Karyawan::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(3)) , 3,"0") as invoice')->first();
        $grade = Grade::all();
        return view ('karyawan.add',[
            'grade' => $grade,
            'karyawan' => null,
            'nip' => $invoice,
            ]);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        $rules = [
            'nama'   => 'required',
            'gander'   => 'required',
            'grade'   => 'required',
            'tgllahir'   => 'required',
            'tglmasuk'   => 'required',
        ];
        
        $messages = [
            'nama.required'      => 'Nama wajib diisi.',
            'gander.required'      => 'Gander wajib diisi.',
            'grade.required'      => 'Grade wajib diisi.',
            'tgllahir.required'      => 'Tgl Lahir wajib diisi.',
            'tglmasuk.required'      => 'Tgl Masuk wajib diisi.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        $invoice = Karyawan::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(3)) , 3,"0") as invoice')->first();
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        if (!is_null($id)) {
            $karyawan = Karyawan::findOrFail($id);
            $edit = true;
        } else {
            $karyawan = new Karyawan;
            $edit = false;
        }
        if($request->input('tglmasuk') < $request->input('tgllahir')){
            return redirect()->route('karyawan')->with('error', 'PROSES INPUT SALAH');
        }else{
            $karyawan->nip = $invoice->invoice;
            $karyawan->nama = $request->input('nama');
            $karyawan->gander = $request->input('gander');
            $karyawan->grade_id = $request->input('grade');
            $karyawan->tgllahir = $request->input('tgllahir');
            $karyawan->tglmasuk = $request->input('tglmasuk');
            $karyawan->save();
            return redirect()->route('karyawan')->with('success', 'Data Berhasil disimpan');
        }
        
    }
    public function date(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        if($startdate == null || $enddate == null){
                return redirect()->route('karyawan')->with('warning', 'DATA BELUM LENGKAP');
            }elseif($startdate > $enddate){
                return redirect()->route('karyawan')->with('warning', 'Tangal awal harus lebih kecil dari tanggal akhir');
            }else{
                $karyawan = Karyawan::whereBetween('tglmasuk', [$startdate, $enddate])->get();
                return view('karyawan.index', [
                    'karyawans' => $karyawan,
                    ]);
                }
            }
            
        /**
         * Display the specified resource.
         *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $invoice = Karyawan::selectRaw('LPAD(CONVERT(COUNT("id"), char(3)) , 3,"0") as invoice')->first();
        $grade = Grade::all();
        return view ('karyawan.add', [
            'karyawan' => $karyawan,
            'grade' => $grade,
            'nip' => $invoice
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == null) {
            return redirect()->back();
            }
            $karyawan = Karyawan::destroy($id);
            return redirect()->route('karyawan')->with('success', 'Data Berhasil Dihapus');
    }
}
