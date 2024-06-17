<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->paginate(10);
        return view('pages.pengguna',['users' => $users]);
    }
    public function store(Request $request){
        DB::table('users')->insert([
            'username' => $request->uname,
            'password' => Hash::make($request->pass),
            'role' => $request->role,
        ]);
        return redirect('/pengguna');
    }
    public function update(Request $request){
        DB::table('users')->where('id',$request->id)->update([
            'username' => $request->uname,
            'password' => Hash::make($request->pass),
            'role' => $request->role,
        ]);
        return redirect('/pengguna');
    }
    public function search(Request $request){
        $search = $request->input('search');
        
        $users = DB::table('users')
            ->where('username', 'like', "%{$search}%")
            ->orWhere('role', 'like', "%{$search}%")
            ->paginate(10);
        
        return view('pages.pengguna',['users' => $users]);
    }
    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('/pengguna');
    }
}