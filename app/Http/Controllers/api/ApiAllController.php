<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiAllController extends Controller
{
   public function provinsi(){
        $provinsi = DB::table('provinsi')->get();
            return response()->json([
                'success' => true,
                'message' => 'Data tersedia',
                'data' => $provinsi
            ], Response::HTTP_OK);
    }
    public function kabupaten(){
        $kabupaten = DB::table('kabupaten')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $kabupaten
        ], Response::HTTP_OK);
    }
    public function kecamatan(){
        $kecamatan = DB::table('kecamatan')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $kecamatan
        ], Response::HTTP_OK);
    }
    public function komoditi(){
        $komoditi = DB::table('komoditi')
            ->join('status_pengusahaan_tanaman', 'status_pengusahaan_tanaman.id', '=', 'komoditi.id_status_pengusahaan_tanaman')
            ->select('komoditi.*', 'status_pengusahaan_tanaman.status_pengusahaan_tanaman')
            ->get();
            return response()->json([
                'success' => true,
                'message' => 'Data tersedia',
                'data' => $komoditi
            ], Response::HTTP_OK);
    }
    public function status_pengusahaan_tanaman(){
        $status_pengusahaan_tanaman = DB::table('status_pengusahaan_tanaman')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $status_pengusahaan_tanaman
        ], Response::HTTP_OK);
    }
    public function tahun() {
        $tahun = DB::table('tahun')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $tahun
        ], Response::HTTP_OK);
    }
    public function semester() {
        $semester = DB::table('semester')
        ->where('is_active', 1)
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $semester
        ], Response::HTTP_OK);
    }
    public function rekapan() {
        $id_user = Auth::id();
        $rekapan = DB::table('rekapan')
        ->join('komoditi', 'komoditi.id', '=', 'rekapan.id_komoditi')
        ->join('provinsi', 'provinsi.id', '=', 'rekapan.id_provinsi')
        ->join('kabupaten', 'kabupaten.id', '=', 'rekapan.id_kabupaten')
        ->join('kecamatan', 'kecamatan.id', '=', 'rekapan.id_kecamatan')
        ->join('tahun', 'tahun.id', '=', 'rekapan.id_tahun')
        ->join('users', 'users.id', '=', 'rekapan.id_users')
        ->join('semester', 'semester.id', '=', 'rekapan.id_semester')
        ->join('status_pengusahaan_tanaman', 'status_pengusahaan_tanaman.id', '=', 'komoditi.id_status_pengusahaan_tanaman')
        ->where('users.id', $id_user)
        ->select('rekapan.*', 'status_pengusahaan_tanaman.status_pengusahaan_tanaman', 'komoditi.nama_komoditi', 'provinsi.nama_provinsi', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'tahun.tahun', 'semester.semester', 'users.fullname')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $rekapan
        ], Response::HTTP_OK);
    }
    
}
