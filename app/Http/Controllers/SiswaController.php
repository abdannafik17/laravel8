<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Siswa;
use App\Models\Telepon;
use App\Models\Kelas;
use App\Models\Hobi;

class SiswaController extends Controller
{
    
    public function index()
    {
        $siswa_list = Siswa::all();
        return view('siswa.index', ['siswa_list' => $siswa_list]);
    }

   
    public function create()
    {
        $list_kelas = Kelas::all();
        $list_hobi = Hobi::all();
        return view('siswa.create', ['list_kelas' => $list_kelas, 'list_hobi' => $list_hobi]);
    }

   
    public function store(SiswaRequest $request)
    {
        DB::beginTransaction();

        $siswa = Siswa::create($request->all());
        
        //input no telepon
        $telepon = new Telepon();
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        //input hobi
        $siswa->hobi()->attach($request->input('hobi'));

        DB::commit();

        return redirect('siswa');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', ['siswa' => $siswa]);
    }

    public function edit($id)
    {        
        $list_kelas = Kelas::all();
        $list_hobi = Hobi::all();
        $siswa = Siswa::findOrFail($id);
        $siswa->no_telepon = !empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-';
        return view('siswa.edit', ['siswa' => $siswa, 'list_kelas' => $list_kelas, 'list_hobi' => $list_hobi]);
    }

    public function update(SiswaRequest $request, $id)
    {      
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        
        //update no hp
        $telepon = $siswa->telepon;
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        //update hobi
        if(!empty($request->input('hobi'))) {
            $siswa->hobi()->sync($request->input('hobi'));
        }

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
