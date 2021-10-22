<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;

class SiswaController extends Controller
{
    
    public function index()
    {
        $siswa_list = Siswa::all();
        return view('siswa.index', ['siswa_list' => $siswa_list]);
    }

   
    public function create()
    {
        return view('siswa.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama' => 'required|string|max:50', 
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);
        Siswa::create($request->all());
        return redirect('siswa');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', ['siswa' => $siswa]);
    }

    public function edit($id)
    {        
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn,'.$request->input('id').',id_siswa',
            'nama' => 'required|string|max:50', 
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::whereIdSiswa($id)->delete();
        return redirect('siswa');
    }
}
