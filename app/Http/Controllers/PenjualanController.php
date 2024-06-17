<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\penjualan;
use App\Models\tanam;
use App\Models\tanaman;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('tanam')->paginate(10);
        $optionLahan=Tanam::distinct()->pluck('lahan');
        
        return view('pages.penjualan',['penjualan' => $penjualan,'optionLahan' => $optionLahan]);
    }
    public function store(Request $request){
        $tanaman = Tanaman::where('jenis', $request->jenisPanen)->pluck('id')->first();
        // dd($tanaman);
        $tanam = Tanam::where('lahan', $request->lahan)
            ->where('tanaman_id',$tanaman)
            ->first();

        DB::table('penjualan')->insert([
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'total' => $request->berat*$request->harga,
            'keterangan' => $request->keterangan,
            'tanam_id' => $tanam->id,
        ]);
        return redirect('/penjualan');
    }
    public function update(Request $request){
        $tanaman = Tanaman::where('jenis', $request->jenisPanen)->pluck('id')->first();
        // dd($tanaman);
        $tanam = Tanam::where('lahan', $request->lahan)
            ->where('tanaman_id',$tanaman)
            ->first();
            
        DB::table('penjualan')->where('id',$request->id)->update([
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'total' => $request->berat*$request->harga,
            'keterangan' => $request->keterangan,
            'tanam_id' => $tanam->id,
        ]);
        return redirect('/penjualan');
    }
    public function search(Request $request){
        $search = $request->input('search');
        
        $penjualan = DB::table('penjualan')
            ->where('tujuan', 'like', "%{$search}%")
            ->orWhere('produk', 'like', "%{$search}%")
            ->orWhere('tanggal', 'like', "%{$search}%")
            ->paginate(10);
        
        return view('pages.penjualan',['penjualan' => $penjualan]);
    }
    public function delete($id){
        DB::table('penjualan')->where('id',$id)->delete();
        return redirect('/penjualan');
    }
    public function getJenisPanen(Request $request){
        $lahan = $request->route('lahan');
        $panen = Tanam::where('lahan', $lahan)->get();
        if ($panen) {
            $tanaman = $panen->pluck('tanaman_id')->all();
        
            // Mengambil data jenis tanaman berdasarkan ID tanaman
            $jenisTanaman = Tanaman::whereIn('id', $tanaman)->get();
            
            // Menggabungkan nama dan jenis tanaman
            $jenisPanen = $jenisTanaman->map(function ($item) {
                return $item->nama . '-' . $item->jenis;
            });
        } else {
            $jenisPanen = 'Tanaman tidak ditemukan';
        }

        return response()->json($jenisPanen);
    }
}
