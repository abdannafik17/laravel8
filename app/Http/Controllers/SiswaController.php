<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Siswa;
use App\Models\Telepon;

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

   
    public function store(SiswaRequest $request)
    {
        try {
            DB::beginTransaction();

            $siswa = Siswa::create($request->all());
            // throw new Exception('Division by zero.');
            $telepon = new Telepon();
            $telepon->no_telepon = $request->input('no_telepon');
            $siswa->telepon()->save($telepon);

            DB::commit();

            return redirect('siswa');

        } catch (\Exception $e) {
            //throw $th;
            echo $e;
            DB::rollback();
        }
        
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', ['siswa' => $siswa]);
    }

    public function edit($id)
    {        
        $siswa = Siswa::findOrFail($id);
        $siswa->no_telepon = !empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-';
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(SiswaRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $siswa = Siswa::findOrFail($id);
            $siswa->update($request->all());


            return redirect('siswa');
        } catch (\Throwable $th) {
            //throw $th;
        }
        
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
