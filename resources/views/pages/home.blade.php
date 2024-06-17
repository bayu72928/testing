@extends('layouts.dashboard')
@section('header-title', 'Dashboard')
@section('content')
    <div class=" container mx-auto">
        <div class="container mx-auto h-5">
            <div class=" grid grid-cols-4 gap-3">
              <div class="container rounded-lg w-full p-10 h-36 items-center flex felx-col bg-white shadow-md">
                <span class="p-2 text-green-600 text-4xl rounded-full bg-green-300"><i class="bx bx-bar-chart"></i></span>
                <div class=" ml-5">
                  <h1 class="block text-3xl font-bold">Rp {{ $totaljual }}</h1>
                  <h3 class="block text-lg font-normal font-sans text-gray-400">Penjualan</h3>
                </div>
              </div>
              <div class="container rounded-lg w-full p-10 h-36 items-center flex felx-col bg-white shadow-md">
                <span class="p-2 text-red-600 text-4xl rounded-full bg-red-300"><i class="bx bx-briefcase"></i></span>
                <div class=" ml-5">
                  <h1 class="block text-3xl font-bold">Rp {{ $totalPengeluaran }}</h1>
                  <h3 class="block text-lg font-normal font-sans text-gray-300">Pengeluaran</h3>
                </div>
              </div>
              <div class="container rounded-lg w-full p-10 h-36 items-center flex felx-col bg-white shadow-md">
                <span class="p-2 text-purple-600 text-4xl rounded-full bg-purple-300"><i class="bx bx-coin-stack"></i></span>
                <div class=" ml-5">
                  <h1 class="block text-3xl font-bold">Rp {{ $lastjual }}/Kg</h1>
                  <h3 class="block text-lg font-normal font-sans text-gray-400">Harga Terakhir</h3>
                </div>
              </div>
              <div class="container rounded-lg w-full p-10 h-36 items-center flex felx-col bg-white shadow-md">
                <span class="p-2 text-yellow-600 text-4xl rounded-full bg-yellow-300"><i class="bx bx-package"></i></span>
                <div class=" ml-5">
                  <h1 class="block text-3xl font-bold">{{ $lastpanen }} Kg</h1>
                  <h3 class="block text-lg font-normal font-sans text-gray-400">Berat Panen Terakhir</h3>
                </div>
              </div>
            </div>
        </div>
        <div class="container block h-72">
            <div class="grid grid-cols-2 gap-2 my-40">
                <div class="">
                    @include('components.charts.penjualan')
                </div>
                <div class="">
                    @include('components.charts.pengeluaran')
              </div>
            </div>
        </div>
    </div>
    <script src="./node_modules/lodash/lodash.min.js"></script>
    <script src="./node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
@endsection
