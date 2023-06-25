<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = DB::select('SELECT kecamatan.*, kabupaten.id AS id_kab, kabupaten.nama_kabupaten from kabupaten, kecamatan WHERE kabupaten.id=kecamatan.id_kabupaten' );
        $kabupaten = DB::table('kabupaten')->get();
        return view('admin.kecamatan',compact('kabupaten','kecamatan'));
    }

    public function add_kecamatan(Request $request){

        // dd($request);
        $data = DB::table('kecamatan')->insert([
            'id_kabupaten' => $request->id_kabupaten,
            'nama_kecamatan' => $request->nama_kecamatan,
                ]);
        return redirect()->route('kecamatan.index');

    }

    public function update_kecamatan(Request $request,$id)
        {
            DB::table('kecamatan')->where('id', $id)->update([
                'id_kabupaten' => $request->id_kabupaten,
                'nama_kecamatan' => $request->nama_kecamatan,
            ]);
            return redirect()->route('kecamatan.index');
        }

   public function delete_kecamatan($id)
    {
        DB::table('kecamatan')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('kecamatan.index');
    }
}
