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
        ->join('status_pengusahaan_tanaman', 'status_pengusahaan_tanaman.id', '=', 'komoditi.id_status_pengusahaan_tanaman')
        ->where('users.id', $id_user)
        ->select('rekapan.*', 'status_pengusahaan_tanaman.status_pengusahaan_tanaman', 'komoditi.nama_komoditi', 'provinsi.nama_provinsi', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'tahun.tahun', 'users.fullname')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $rekapan
        ], Response::HTTP_OK);
    }
    public function tambah_rekapan(Request $request){
        $id_user = Auth::id();

        $validated = $request->validate([
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'id_tahun' => 'required',
            'id_komoditi' => 'required',
            'tbm' => 'required',
            'tm' => 'required',
            'tr' => 'required',
            'jumlah' => 'required',
            'produksi' => 'required',
            'pekebun' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $produktivitas = $request->produksi / $request->tm;
        $rekap = DB::table('rekapan')->insert([
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'id_tahun' => $request->id_tahun,
            'id_komoditi' => $request->id_komoditi,
            'id_users' => $id_user,
            'tbm' => $request->tbm,
            'tm' => $request->tm,
            'tr' => $request->tr,
            'jumlah' => $request->jumlah,
            'produksi' => $request->produksi,
            'produktivitas' => $produktivitas,
            'pekebun' => $request->pekebun,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rekapan berhasil di input',
            'data' => $rekap
        ], Response::HTTP_OK);

    }
    
    public function update_rekapan(Request $request){
        $id_user = Auth::id();

        $validated = $request->validate([
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'id_kecamatan' => 'required',
            'id_tahun' => 'required',
            'id_komoditi' => 'required',
            'tbm' => 'required',
            'tm' => 'required',
            'tr' => 'required',
            'jumlah' => 'required',
            'produksi' => 'required',
            'pekebun' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $produktivitas = $request->produksi / $request->tm;
        $rekap = DB::table('rekapan')->update([
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'id_kecamatan' => $request->id_kecamatan,
            'id_tahun' => $request->id_tahun,
            'id_komoditi' => $request->id_komoditi,
            'id_users' => $id_user,
            'tbm' => $request->tbm,
            'tm' => $request->tm,
            'tr' => $request->tr,
            'jumlah' => $request->jumlah,
            'produksi' => $request->produksi,
            'produktivitas' => $produktivitas,
            'pekebun' => $request->pekebun,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rekapan berhasil di diubah',
            'data' => $rekap
        ], Response::HTTP_OK);

    }
}
