<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laporan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        $laporan=Laporan::paginate(10);

        return view('pages.laporan',['laporan'=>$laporan]);
    }
}
