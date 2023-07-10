<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunController extends Controller
{
    public function index()
    {
        $tahun = DB::table('tahun')->get();
        return view('admin.tahun', compact('tahun'));
    }

    public function add_tahun(Request $request){

        // dd($request);
        $data = DB::table('tahun')->insert([
            'tahun' => $request->tahun,
            'is_active' => 1,
                ]);
        return redirect()->route('tahun.index');

    }

    public function update_tahun(Request $request,$id)
        {
            DB::table('tahun')->where('id', $id)->update([
                'tahun' => $request->tahun, 'is_active' => $request->is_active
            ]);
            return redirect()->route('tahun.index');
        }

   public function delete_tahun($id)
    {
        DB::table('tahun')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('tahun.index');
    }
}
