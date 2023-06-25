<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusPengusahaanController extends Controller
{
    public function index()
    {
        $status_pengusahaan_tanaman = DB::table('status_pengusahaan_tanaman')->get();
        return view('admin.status_pengusahaan_tanaman', compact('status_pengusahaan_tanaman'));
    }

    public function add_status_pengusahaan(Request $request){

        // dd($request);
        $data = DB::table('status_pengusahaan_tanaman')->insert([
            'status_pengusahaan_tanaman' => $request->status_pengusahaan_tanaman,
                ]);
        return redirect()->route('status_pengusahaan.index');

    }

    public function update_status_pengusahaan(Request $request,$id)
        {
            DB::table('status_pengusahaan_tanaman')->where('id', $id)->update([
                'status_pengusahaan_tanaman' => $request->status_pengusahaan_tanaman,
            ]);
            return redirect()->route('status_pengusahaan.index');
        }

   public function delete_status_pengusahaan($id)
    {
        DB::table('status_pengusahaan_tanaman')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('status_pengusahaan.index');
    }
}
