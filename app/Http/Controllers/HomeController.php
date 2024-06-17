<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengeluaran;
use App\Models\penjualan;
use App\Models\panen;



class HomeController extends Controller
{
    public function index(){
        $totalPengeluaran = Pengeluaran::sum('total');
        $penjualan=Penjualan::all();
        $lastjual=Penjualan::latest()->first();
        if(!$lastjual){
            $lastjual=0;
        }
        else{
            $lastjual=$lastjual->harga;
        }
        $lastpanen=Panen::latest()->first(['berat'])->berat;
        $totaljual=Penjualan::sum('total');

        return view('pages.home', compact('penjualan', 'lastjual', 'lastpanen', 'totaljual', 'totalPengeluaran'));
    }
}
