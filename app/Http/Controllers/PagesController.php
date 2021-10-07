<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function dataSiswa() {
        return view('pages.admin.data_siswa');
    }
}
