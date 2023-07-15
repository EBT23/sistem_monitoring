<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    public function provinsi()
    {
        $provinsi = DB::table('provinsi')->get();
        return view('admin.provinsi', compact('provinsi'));
    }

    public function add_provinsi(Request $request){

        // dd($request);
        $data = DB::table('provinsi')->insert([
            'nama_provinsi' => $request->nama_provinsi,
                ]);
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');

    }

    public function update_provinsi(Request $request,$id)
        {
            DB::table('provinsi')->where('id', $id)->update([
                'nama_provinsi' => $request->nama_provinsi,
            ]);
            return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diubah.');
        }

   public function delete_provinsi($id)
    {
        DB::table('provinsi')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }

}
