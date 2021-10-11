<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Kriteria;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerhitunganController extends Controller
{
    public function hitung(Request $request) {
        try {
            // Mengambil data Ekstrakulikuler dan Kriteria
            $ekstrakulikulers = Ekstrakulikuler::all();
            $kriterias = Kriteria::all();

            // Konversi Bentuk Inputan sehingga menjadi group
            $data = [];
            foreach ($ekstrakulikulers as $keyEks => $ekstrakulikuler) {
                foreach ($kriterias as $keyKrit => $kriteria) {
                    $data[$keyEks][$keyKrit] = $request[$ekstrakulikuler->id.'_pilihan_'.$kriteria->id];
                }
            }

            // Normalisasi Kriteria
            $normalisasiKriteria = self::normalisasiKriteria($kriterias);

            // Perhitungan SAW (Alternatif * Normalisasi Kriteria)
            $countSAW = [];
            for ($i=0; $i < count($data); $i++) { 
                for ($j=0; $j < count($data[$i]); $j++) { 
                    $countSAW[$i][$j] = $data[$i][$j] * $normalisasiKriteria[$j];
                }
            }

            // Penjumlahan Hasil SAW
            $count_result = [];
            for ($i=0; $i < count($countSAW); $i++) { 
                $temp = 0;
                for ($j=0; $j < count($countSAW[$i]); $j++) { 
                    $temp += $countSAW[$i][$j];
                }
                $count_result[$i] = $temp;
            }

            // Penggabungan
            $result = collect();
            foreach ($ekstrakulikulers as $key => $ekstrakulikuler) {
                $temp = [];
                $temp['id'] = $ekstrakulikuler->id;
                $temp['nama'] = $ekstrakulikuler->nama;
                $temp['hasil'] = strval(round($count_result[$key],2));
                $result->push($temp);
            }

            // Mengurutkan berdasarkan nilai tertinggi
            $resultSort = $result->sortByDesc('hasil');

            // Membuat Group Berdasarkan Hasil yang sama
            $grouped = $resultSort->groupBy('hasil');

            $response = [
                'message' => 'Calculation Completed',
                'data' => $grouped->first()->sortBy('nama'),
            ];
            
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed '.$e,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    private static function normalisasiKriteria($kriterias) {
        $data = [];
        $totalBobot = 0;
        foreach ($kriterias as $key => $kriteria) {
            $totalBobot += $kriteria->bobot;
        }

        foreach ($kriterias as $key => $kriteria) {
            $data[$key] = round($kriteria->bobot/$totalBobot,3);
        }

        return $data;
    }
}
