<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tanaman;

class TanamanController extends Controller
{
    public function index()
    {
        $tanaman = DB::table('tanaman')->paginate(10);
        return view('pages.tanaman',['tanamans' => $tanaman]);
    }
    public function store(Request $request){
        DB::table('tanaman')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'keterangan' => $request->ket,
        ]);
        return redirect('/tanaman');
    }
    public function update(Request $request){
        DB::table('tanaman')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'keterangan' => $request->ket,
        ]);
        return redirect('/tanaman');
    }
    public function search(Request $request){
        $search = $request->input('search');
        
        $tanaman = DB::table('tanaman')
            ->where('nama', 'like', "%{$search}%")
            ->orWhere('jenis', 'like', "%{$search}%")
            ->orWhere('keterangan', 'like', "%{$search}%")
            ->paginate(10);
        
        return view('pages.tanaman',['tanamans' => $tanaman]);
    }
    public function delete($id){
        DB::table('tanaman')->where('id',$id)->delete();
        return redirect('/tanaman');
    }
}
