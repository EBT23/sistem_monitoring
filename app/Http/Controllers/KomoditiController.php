<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomoditiController extends Controller
{
    public function index()
    {
        $komoditi = DB::select('SELECT komoditi.*, status_pengusahaan_tanaman.id AS id_status, status_pengusahaan_tanaman.status_pengusahaan_tanaman from komoditi, status_pengusahaan_tanaman WHERE komoditi.id_status_pengusahaan_tanaman=status_pengusahaan_tanaman.id; ' );
        $status_pt = DB::table('status_pengusahaan_tanaman')->get();
        return view('admin.komoditi',compact('komoditi','status_pt'));
    }

    public function add_komoditi(Request $request){

        // dd($request);
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $gambar = $imageName;
        }
        DB::table('komoditi')->insert([
            'id_status_pengusahaan_tanaman' => $request->id_status_pt,
            'nama_komoditi' => $request->nama_komoditi,
            'gambar' => $gambar
                ]);
        return redirect()->route('komoditi.index')->with('success', 'Komoditi berhasil ditambahkan.');

    }

    public function update(Request $request,$id)
        {
                       
            $gambar = null;
            
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $gambar = $imageName;
            }
            
            DB::table('komoditi')->where('id', $id)->update([
                'id_status_pengusahaan_tanaman' => $request->id_status_pt,
                'nama_komoditi' => $request->nama_komoditi,
                'gambar' => $gambar
            ]);
            
            return redirect()->route('komoditi.index')->with('success', 'Komoditi berhasil diperbarui.');
        }

   public function delete_komoditi($id)
    {
        DB::table('komoditi')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('komoditi.index')->with('success', 'Komoditi berhasil dihapus.');
    }
}
