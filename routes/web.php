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

// Route::get('/', [HomePageController::class, 'index'])->name('halamanawal');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomePageController::class, 'index'])->name('home');
    Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('halamanabout');
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('userprofile');


    Route::resource('siswa', SiswaController::class);
});


// Route::get('student/{id}/{name}', function($id, $name){
//     return 'ID Siswa = '.$id.', name = '.$name;
// });

// Route::get('master/halaman-pegawai', function(){
//     return 'Halaman Pegawai';
// })->name('employee');

// Route::get('emp', function(){
//     return redirect()->route('employee');
// });


Auth::routes();
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'], function () {
    return abort(404);
});
Route::get('/oauth/redirect/pln', [App\Http\Controllers\SSOController::class, 'getPLNRedirect']);
Route::get('/oauth/handle/pln', [App\Http\Controllers\SSOController::class, 'getPLNHandle']);
Route::get('/oauth/logout', [App\Http\Controllers\SSOController::class, 'logoutSSO'])->name('logout_sso');

// Route::get('oauth/handle/pln', 'SSOController@getPLNHandle');
// Route::get('oauth/redirect/pln', 'SSOController@getPLNRedirect');
// Route::get('oauth/logout', 'SSOController@logoutSSO')->name('logout_sso');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
