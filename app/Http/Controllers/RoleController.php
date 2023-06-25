<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $role = DB::table('user_role')->get();
        return view('admin.role', compact('role'));
    }

    public function add_role(Request $request){

        // dd($request);
        $data = DB::table('user_role')->insert([
            'role' => $request->role,
                ]);
        return redirect()->route('role.index');

    }

    public function update_role(Request $request,$id)
        {
            DB::table('user_role')->where('id', $id)->update([
                'role' => $request->role,
            ]);
            return redirect()->route('role.index');
        }

   public function delete_role($id)
    {
        DB::table('user_role')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('role.index');
    }

}
