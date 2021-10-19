<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.homepage');
})->name('halamanawal');

Route::get('about', function(){
    return view('about');
})->name('halamanabout');

Route::get('profile', function(){
    return view('profile');
})->name('userprofile');

Route::get('siswa',function(){
    $siswa = ['Fulan', 'Budi', 'Tini'];
    return view('siswa.index', ['siswa' => $siswa]);
})->name('siswa.index');

Route::get('student/{id}/{name}', function($id, $name){
    return 'ID Siswa = '.$id.', name = '.$name;
});

Route::get('master/halaman-pegawai', function(){
    return 'Halaman Pegawai';
})->name('employee');

Route::get('emp', function(){
    return redirect()->route('employee');
});
