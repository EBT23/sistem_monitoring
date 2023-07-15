<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapanController extends Controller
{
   public function index() {
        $rekapan = DB::select("SELECT rekapan.id, provinsi.nama_provinsi, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan, tahun.tahun,komoditi.nama_komoditi, komoditi.gambar, status_pengusahaan_tanaman.status_pengusahaan_tanaman, users.fullname, rekapan.tbm, rekapan.tm, rekapan.tr, rekapan.jumlah, rekapan.produksi, rekapan.produktivitas, rekapan.pekebun, rekapan.status, rekapan.keterangan
                                FROM rekapan, provinsi, kabupaten, kecamatan, tahun, komoditi, status_pengusahaan_tanaman, users 
                                WHERE rekapan.id_provinsi = provinsi.id
                                AND rekapan.id_kabupaten = kabupaten.id
                                AND rekapan.id_kecamatan = kecamatan.id
                                AND rekapan.id_tahun = tahun.id
                                AND rekapan.id_users = users.id
                                AND rekapan.id_komoditi = komoditi.id
                                AND komoditi.id_status_pengusahaan_tanaman = status_pengusahaan_tanaman.id");
        return view('admin.rekapan', compact('rekapan'));
    }

   public function acc($id) {
    DB::table('rekapan')
    ->where('id', $id)
    ->update(['status' => 1]);

    return redirect()->route('rekapan.index')->with('success', 'Status berhasil verifikasi.');
    }
   public function tolak($id) {
    DB::table('rekapan')
    ->where('id', $id)
    ->update(['status' => 2]);

    return redirect()->route('rekapan.index')->with('success', 'Status berhasil ditolak.');
    }
    public function batalkan($id){
         DB::table('rekapan')
              ->where('id', $id)
              ->update(['status' => 3]);

    return redirect()->route('rekapan.index')->with('success', 'Status berhasil dibatalkan.');
    }
}
