<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomePageController;

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

Route::get('/', [HomePageController::class, 'index'])->name('halamanawal');

Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('halamanabout');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('userprofile');


Route::resource('siswa', SiswaController::class);

Route::get('student/{id}/{name}', function($id, $name){
    return 'ID Siswa = '.$id.', name = '.$name;
});

Route::get('master/halaman-pegawai', function(){
    return 'Halaman Pegawai';
})->name('employee');

Route::get('emp', function(){
    return redirect()->route('employee');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
