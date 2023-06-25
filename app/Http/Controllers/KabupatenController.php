<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupaten = DB::select('SELECT kabupaten.*, provinsi.id AS id_prov, provinsi.nama_provinsi from provinsi, kabupaten WHERE provinsi.id=kabupaten.id_provinsi; ' );
        $provinsi = DB::select('SELECT provinsi.id AS id_prov, provinsi.nama_provinsi from provinsi');
        return view('admin.kabupaten',compact('kabupaten','provinsi'));
    }

    public function add_kabupaten(Request $request){

        // dd($request);
        $data = DB::table('kabupaten')->insert([
            'id_provinsi' => $request->id_provinsi,
            'nama_kabupaten' => $request->nama_kabupaten,
                ]);
        return redirect()->route('kabupaten.index');

    }

    public function update_kabupaten(Request $request,$id)
        {
            DB::table('kabupaten')->where('id', $id)->update([
                'id_provinsi' => $request->id_provinsi,
                'nama_kabupaten' => $request->nama_kabupaten,
            ]);
            return redirect()->route('kabupaten.index');
        }

   public function delete_kabupaten($id)
    {
        DB::table('kabupaten')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('kabupaten.index');
    }
}
