<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = DB::table('pengeluaran')->paginate(10);
        return view('pages.pengeluaran',['pengeluaran' => $pengeluaran]);
    }
    public function store(Request $request){
        DB::table('pengeluaran')->insert([
            'tujuan' => $request->tujuan,
            'produk' => $request->produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/pengeluaran');
    }
    public function update(Request $request){
        DB::table('pengeluaran')->where('id',$request->id)->update([
            'tujuan' => $request->tujuan,
            'produk' => $request->produk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->jumlah * $request->harga,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/pengeluaran');
    }
    public function search(Request $request){
        $search = $request->input('search');
        
        $pengeluaran = DB::table('pengeluaran')
            ->where('tujuan', 'like', "%{$search}%")
            ->orWhere('produk', 'like', "%{$search}%")
            ->orWhere('tanggal', 'like', "%{$search}%")
            ->paginate(10);
        
        return view('pages.pengeluaran',['pengeluaran' => $pengeluaran]);
    }
    public function delete($id){
        DB::table('pengeluaran')->where('id',$id)->delete();
        return redirect('/pengeluaran');
    }
}
