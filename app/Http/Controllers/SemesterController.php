<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = DB::table('semester')->get();
        return view('admin.semester', compact('semester'));
    }

    public function add_semester(Request $request){

        // dd($request);
        $data = DB::table('semester')->insert([
            'semester' => $request->nama_semester,
            'is_active' => 1,
                ]);
        return redirect()->route('semester.index');

    }

    public function update_semester(Request $request,$id)
        {
            DB::table('semester')->where('id', $id)->update([
                'semester' => $request->nama_semester,
            ]);
            return redirect()->route('semester.index');
        }

   public function delete_semester($id)
    {
        DB::table('semester')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('semester.index');
    }
}
