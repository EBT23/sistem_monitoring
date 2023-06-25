<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT users.*, user_role.id as id_role, user_role.role From users, user_role WHERE users.role=user_role.id' );
        $user_role = DB::table('user_role')->get();

        return view('admin.users', compact('users','user_role'));
    }

    public function add_user(Request $request){

        // dd($request);
        $data = DB::table('users')->insert([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'role' => $request->role,
            'is_active' => 1,
                ]);
        return redirect()->route('user.index');

    }

    public function update_user(Request $request,$id)
        {
            DB::table('users')->where('id', $id)->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => hash::make($request->password),
                'role' => $request->role,
                'is_active' => 1,    
            ]);
            return redirect()->route('user.index');
        }

   public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('user.index');
    }
}
