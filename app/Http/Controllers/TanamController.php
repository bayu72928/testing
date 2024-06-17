<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tanam;
use App\Models\tanaman;
use App\Models\panen;
use App\Models\laporan;
use Illuminate\Support\Facades\DB;

class TanamController extends Controller
{
    public function index(){
        $data=Tanam::with('tanaman')->with('panen')->paginate(10);
        $optionTanaman=Tanaman::distinct()->pluck('nama');

        return view('pages.pertanian',['data'=>$data,'optionTanaman'=>$optionTanaman]);
    }
    public function store(Request $request){
        $request->validate([
            'lahan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nama_tanaman' => 'required',
            'jenis_tanaman' => 'required',
        ]);
    
        // Cari tanaman berdasarkan nama dan jenis
        $tanaman = Tanaman::where('nama', $request->nama_tanaman)
            ->where('jenis', $request->jenis_tanaman)
            ->first();
    
        if (!$tanaman) {
            return redirect()->back()->with('error', 'Tanaman tidak ditemukan.');
        }
    
        // Buat data tanam baru dengan menggunakan id tanaman yang ditemukan
        $tanam = Tanam::create([
            'lahan' => $request->lahan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'tanaman_id' => $tanaman->id,
        ]);
    
        return redirect('/pertanian');
    }
    public function getPanenByIdTanam($idTanam)
    {
        $datapanen = Panen::where('tanam_id', $idTanam)->get();

        if ($datapanen) {
            $panen = $datapanen->all();
        } else {
            $panen = 'Tanaman tidak ditemukan';
        }

        return response()->json($panen);
    }
    public function getJenisTanaman(Request $request){
        $tanamanNama = $request->route('nama');
        $tanaman = Tanaman::where('nama', $tanamanNama)->get();
        if ($tanaman) {
            $jenisTanaman = $tanaman->pluck('jenis')->all();
        } else {
            $jenisTanaman = 'Tanaman tidak ditemukan';
        }

        return response()->json($jenisTanaman);
    }
    public function panenStore(Request $request){
        $request->validate([
            'id' => 'required',
            'tanggal' => 'required',
            'berat' => 'required',
            'keterangan' => 'required',
        ]);
    
        $cek=DB::table('panen')->where('tanam_id',$request->id)->exists();
        if(!$cek){
            Tanam::where('id', $request->id)->update(['status' => 'ongoing']);
        }
        // Buat data tanam baru dengan menggunakan id tanaman yang ditemukan
        Panen::create([
            'tanggal' => $request->tanggal,
            'berat' => $request->berat,
            'keterangan' => $request->keterangan,
            'tanam_id' => $request->id,
        ]);
    
        return redirect('/pertanian');
    }
    public function doneTanam(Request $request){
        $idTanam=$request->id;

        Tanam::where('id', $idTanam)->update(['status' => 'done']);
        $data=Tanam::where('id', $request->id)->first();

        if(!$idTanam){
            return redirect('/home')->with('error','data tidak ditemukan');
        }

        $part=explode('-',$data->tanggal);
        $kode=$data->id.implode('', $part);
        $date=date("Y-m-d");

        Laporan::create([
            'kode' => $kode,
            'tanggal' => $date,
            'tanaman_id'=> $data->tanaman_id,
            'tanam_id'=> $data->id,
        ]);
        return redirect('/pertanian');
    }
}
