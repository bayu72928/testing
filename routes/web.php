<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('pages.login');
})->name('login');
Route::post('/login', 'App\Http\Controllers\auth\loginController@login');
Route::post('/logout', 'App\Http\Controllers\auth\loginController@logout');

Route::middleware('auth')->group(function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    // pengeluaran
    Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
    Route::post('/pengeluaran/store','App\Http\Controllers\PengeluaranController@store');
    Route::post('/pengeluaran/update','App\Http\Controllers\PengeluaranController@update');
    Route::get('/pengeluaran/delete/{id}','App\Http\Controllers\PengeluaranController@delete');
    Route::get('/pengeluaran/search','App\Http\Controllers\PengeluaranController@search');
    // tanam&panen
    Route::get('/pertanian', 'App\Http\Controllers\TanamController@index');
    Route::post('/pertanian/store','App\Http\Controllers\TanamController@store');
    Route::post('/pertanian/update','App\Http\Controllers\TanamController@update');
    Route::get('/pertanian/delete/{id}','App\Http\Controllers\TanamController@delete');
    Route::get('/pertanian/search','App\Http\Controllers\TanamController@search');
    Route::post('/panen/store','App\Http\Controllers\TanamController@panenStore');
    Route::post('/pertanian/done/','App\Http\Controllers\TanamController@doneTanam');
    Route::get('/get-data-panen/{idTanam}', 'App\Http\Controllers\TanamController@getPanenByIdTanam');
    Route::get('/get-jenis-tanaman/{nama}', 'App\Http\Controllers\TanamController@getJenisTanaman');
    // tanaman
    Route::get('/tanaman', 'App\Http\Controllers\TanamanController@index');
    Route::post('/tanaman/store','App\Http\Controllers\TanamanController@store');
    Route::post('/tanaman/update','App\Http\Controllers\TanamanController@update');
    Route::get('/tanaman/delete/{id}','App\Http\Controllers\TanamanController@delete');
    Route::get('/tanaman/search','App\Http\Controllers\TanamanController@search');
    // penjualan
    Route::get('/penjualan', 'App\Http\Controllers\PenjualanController@index');
    Route::post('/penjualan/store','App\Http\Controllers\PenjualanController@store');
    Route::post('/penjualan/update','App\Http\Controllers\PenjualanController@update');
    Route::get('/penjualan/delete/{id}','App\Http\Controllers\PenjualanController@delete');
    Route::get('/penjualan/search','App\Http\Controllers\PenjualanController@search');
    Route::get('/get-jenis-panen/{lahan}', 'App\Http\Controllers\PenjualanController@getJenisPanen');
    // Laporan
    Route::get('/laporan', 'App\Http\Controllers\LaporanController@index');
    Route::post('/laporan/store','App\Http\Controllers\LaporanController@store');
    Route::post('/laporan/update','App\Http\Controllers\LaporanController@update');
    Route::get('/laporan/delete/{id}','App\Http\Controllers\LaporanController@delete');
    Route::get('/laporan/search','App\Http\Controllers\LaporanController@search');
    // pengguna
    Route::get('/pengguna', 'App\Http\Controllers\UserController@index');
    Route::post('/pengguna/store','App\Http\Controllers\UserController@store');
    Route::post('/pengguna/update','App\Http\Controllers\UserController@update');
    Route::get('/pengguna/delete/{id}','App\Http\Controllers\UserController@delete');
    Route::get('/pengguna/search','App\Http\Controllers\UserController@search');
    
    Route::get('/logout', function () {
        return view('pages.login');
    });
});