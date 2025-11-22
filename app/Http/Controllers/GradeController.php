<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Validator;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Grade::all();
        return view('grade.index', [
            'grades' => $grade,
            ])->with('success', 'Data Berhasil Dikirim');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('grade.add',[
            'grade' => null,
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
            'grade'   => 'required',
            'gaji'   => 'required',
        ];

        $messages = [
            'grade.required'      => 'Grade wajib diisi.',
            'gaji.required'      => 'Gaji wajib diisi.',
        ];

       $validator = Validator::make($request->all(), $rules, $messages);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if (!is_null($id)) {
            $grade = Grade::findOrFail($id);
            $edit = true;
        } else {
            $grade = new Grade;
            $edit = false;
        }
        $grade->grade = $request->input('grade');
        $grade->gaji = $request->input('gaji');
        $grade->save();

        return redirect()->route('grade')->with('success', 'Data Berhasil Dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view ('grade.add', [
            'grade' => $grade
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == null) {
            return redirect()->back();
            }
            $grade = Grade::destroy($id);
            return redirect()->route('grade')->with('success', 'Data Berhasil Dihapus');
    }
}
