<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = siswa::all();
        // return view('siswa.index',compact('siswa'));
        return response()->json($siswas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nis'=> 'required|unique:siswa,nis',
            'nama' =>'required',
            


        ]);
        $siswa = siswa::create($request->all());
        // return redirect() -> route('siswa.index')->with('success','siswa berhasil ditambahkan');
        return response()->json($siswa);
    }
    /**
     * Display the specified resource.
     */
    public function show(siswa $id)
    {
        
        $siswa = siswa::find($id);
        // return view('siswa.show',compact('siswa'));
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa $siswa)
    {
        return view('siswa.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        $siswa = siswa::find($id);
        $siswa->update($request->all());
        // return redirect()->route('siswa.index')->with('success', 'siswa updated successfully');
        return response()->json($siswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = siswa::destroy($id);
        // return redirect()->route('siswa.index')->with('success', 'siswa deleted successfully');
        return response()->json($siswa);
    }
}

