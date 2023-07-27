<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        $total_kabupaten = DB::select("SELECT COUNT(kabupaten.nama_kabupaten) AS jumlah_kabupaten FROM kabupaten");
        $total_kabupaten=$total_kabupaten[0]->jumlah_kabupaten;
        $total_kecamatan = DB::select("SELECT COUNT(kecamatan.nama_kecamatan) AS jumlah_kecamatan FROM kecamatan");
        $total_kecamatan=$total_kecamatan[0]->jumlah_kecamatan;
        $total_komoditi = DB::select("SELECT COUNT(komoditi.nama_komoditi) AS jumlah_komoditi FROM komoditi, status_pengusahaan_tanaman WHERE komoditi.id_status_pengusahaan_tanaman = status_pengusahaan_tanaman.id ");
        $total_komoditi = $total_komoditi[0]->jumlah_komoditi;
        $tahun = DB::select('SELECT * FROM tahun');
        return view('index', $data, compact('total_kabupaten', 'total_kecamatan', 'total_komoditi', 'tahun'));
    }
    public function chartData($id)
    {
        $jumlah_produksi = DB::select("SELECT komoditi.nama_komoditi, SUM(rekapan.produksi) AS jumlah_produksi FROM `rekapan`, `komoditi` WHERE komoditi.id = rekapan.id_komoditi AND rekapan.id_tahun = $id GROUP BY komoditi.nama_komoditi");


        $data = [];

        foreach ($jumlah_produksi as $produksi) {
            $data[] = [
                'label' => $produksi->nama_komoditi,
                'value' => $produksi->jumlah_produksi,
            ];
        }

        return response()->json($data);
    }
    public function areachartData($id)
    {
        $luas_area = DB::select("SELECT komoditi.id as id_komoditi, komoditi.nama_komoditi, SUM(rekapan.jumlah) AS luas_area FROM `rekapan`, `komoditi` WHERE komoditi.id = rekapan.id_komoditi  AND rekapan.id_tahun = $id GROUP BY komoditi.id, komoditi.nama_komoditi");


        $data = [];

        foreach ($luas_area as $produksi) {
            $data[] = [
                'label' => $produksi->nama_komoditi,
                'value' => $produksi->luas_area,
            ];
        }

        return response()->json($data);
    }
}
