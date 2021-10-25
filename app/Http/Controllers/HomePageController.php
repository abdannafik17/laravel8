<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;

class HomePageController extends Controller
{
    public function index()
    {
        $jumlah_siswa = Siswa::count();
        return view('pages.homepage', ['jumlah_siswa' => $jumlah_siswa]);
    }
}
