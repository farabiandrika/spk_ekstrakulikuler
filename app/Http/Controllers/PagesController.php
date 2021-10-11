<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function dataSiswa() {
        return view('pages.admin.data_siswa');
    }

    public function dataKriteria() {
        return view('pages.admin.data_kriteria');
    }

    public function dataEkstrakulikuler() {
        return view('pages.admin.data_ekstrakulikuler');
    }

    public function biodata() {
        return view('pages.siswa.biodata');
    }

    public function ekstrakulikuler() {
        $ekstrakulikulers = Ekstrakulikuler::all();
        $kriterias = Kriteria::all();
        
        if (auth()->user()->ekstrakulikuler_id != null) {
            return view('pages.siswa.ekstrakulikuler_done');
        }

        return view('pages.siswa.ekstrakulikuler', compact(['kriterias','ekstrakulikulers']));
    }

    public function listEkstrakulikuler() {
        return view('pages.admin.list_ekstrakulikuler');
    }
}
