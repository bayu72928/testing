@extends('layouts.dashboard')
@section('header-title', 'Laporan')
@section('content')
    <div class="container p-4 mx-auto max-w-screen-xl">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 ">
                        <div class="py-3 px-4 grid grid-cols-2">
                            <div class="relative max-w-xs">
                                <label for="hs-table-search" class="sr-only">Search</label>
                                <input type="text" name="hs-table-search" id="hs-table-search"
                                    class=" transition mt-1 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200"
                                    placeholder="Search for items">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                    <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden border rounded-lg shadow-md ">
                            <table class="min-w-full divide-y text-center divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Kode
                                            Laporan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                            Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $item)
                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100" data-hs-overlay="#detail-modal">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$loop->iteration}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->kode}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{date('d F Y', strtotime($item->tanggal))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{ $laporan->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
            <!--Detail-->
            <div id="detail-modal"
                class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/50 hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-screen-lg sm:w-full m-3 sm:mx-auto">
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4">
                            <h3 class="font-bold text-gray-800">
                                Detail Laporan
                            </h3>
                            <button type="button"
                                class="transition flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#detail-modal">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="container rounded-xl gap-3 bg-gray-200 pb-4 shadow-lg">
                            <div class="p-3 overflow-y-auto grid grid-cols-6 gap-3">
                                <label for="kode" class="font-sans text-justify text-lg text-black font-medium">Kode
                                    Laporan</label>
                                <label for="kode"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">:
                                    01030124</label>
                                <label for="tanggal" class="font-sans text-justify text-lg text-black font-medium">Tanggal
                                    Laporan</label>
                                <label for="tanggal"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">: 1 juni
                                    2024</label>
                                <label for="lahan"
                                    class="font-sans text-justify text-lg text-black font-medium">Lahan</label>
                                <label for="lahan"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">: Lahan
                                    1</label>
                                <label for="nama" class="font-sans text-justify text-lg text-black font-medium">Nama
                                    Tanaman</label>
                                <label for="nama"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">:
                                    Cabai</label>
                                <label for="janis" class="font-sans text-justify text-lg text-black font-medium">Jenis
                                </label>
                                <label for="janis"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">: Rawit
                                    Ori</label>
                                <label for="tanggal-panen"
                                    class="font-sans text-justify text-lg text-black font-medium">Tanggal Tanam</label>
                                <label for="tanggal-panen"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">: 12 Maret
                                    2024</label>
                                <label for="total" class="font-sans text-justify text-lg text-black font-medium">Total
                                    Berat Panen</label>
                                <label for="total"
                                    class="font-sans text-justify text-lg text-black border-r border-gray-400">: 320
                                    Kg</label>
                            </div>
                        </div>
                        <div class="p-4 -mt-5 rounded-xl overflow-y-auto bg-gray-300 shadow-md">
                            <select id="tab-select"
                                class="sm:hidden py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                aria-label="Tabs">
                                <option value="#hs-tab-to-select-1">Panen</option>
                                <option value="#hs-tab-to-select-2">Penjualan</option>
                            </select>

                            <div class="hidden sm:block border-b border-gray-200">
                                <nav class="flex space-x-2" aria-label="Tabs" role="tablist"
                                    hs-data-tab-select="#tab-select">
                                    <button type="button"
                                        class="hs-tab-active:bg-gray-300 hs-tab-active:border-b-transparent hs-tab-active:text-blue-600 -mb-px py-3 px-4 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-t-lg hover:text-gray-700 disabled:opacity-50 disabled:pointer-events-none active"
                                        id="hs-tab-to-select-item-1" data-hs-tab="#hs-tab-to-select-1"
                                        aria-controls="hs-tab-to-select-1" role="tab">
                                        Panen
                                    </button>
                                    <button type="button"
                                        class="hs-tab-active:bg-gray-300 hs-tab-active:border-b-transparent hs-tab-active:text-blue-600 -mb-px py-3 px-4 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-t-lg hover:text-gray-700 disabled:opacity-50 disabled:pointer-events-none"
                                        id="hs-tab-to-select-item-2" data-hs-tab="#hs-tab-to-select-2"
                                        aria-controls="hs-tab-to-select-2" role="tab">
                                        Penjualan
                                    </button>
                                </nav>
                            </div>

                            <div class="mt-3">
                                <div id="hs-tab-to-select-1" role="tabpanel" aria-labelledby="hs-tab-to-select-item-1">
                                    <div class="p-3 sm:p-0">
                                        <div>
                                            <div class="-m-1.5 overflow-x-auto">
                                                <div class="p-1.5 min-w-full inline-block align-middle">
                                                    <div class="border rounded-lg divide-y divide-gray-200 ">
                                                        <div class="py-3 px-4 grid grid-cols-2">
                                                            <div class="relative max-w-xs">
                                                                <label for="hs-table-search"
                                                                    class="sr-only">Search</label>
                                                                <input type="text" name="hs-table-search"
                                                                    id="hs-table-search"
                                                                    class=" transition mt-1 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200"
                                                                    placeholder="Search for items">
                                                                <div
                                                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                                    <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <circle cx="11" cy="11" r="8">
                                                                        </circle>
                                                                        <path d="m21 21-4.3-4.3"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="overflow-hidden border rounded-lg shadow-md ">
                                                            <table class="min-w-full divide-y text-center divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            No</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Tanggal Panen</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Berat</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Keterangan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-panen-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Maret 2024</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            120 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            -</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-panen-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            2</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Mei 2024</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            0 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            -</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-panen-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            3</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Januari 2024</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            520 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            -</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-panen-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            4</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Januari 2023</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            10 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            -</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="py-1 px-4">
                                                            <nav class="flex items-center space-x-1">
                                                                <button type="button"
                                                                    class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="sr-only">Previous</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none "
                                                                    aria-current="page">1</button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none">2</button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none">3</button>
                                                                <button type="button"
                                                                    class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                                                                    <span class="sr-only">Next</span>
                                                                    <span aria-hidden="true">»</span>
                                                                </button>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hs-tab-to-select-2" class="hidden" role="tabpanel"
                                    aria-labelledby="hs-tab-to-select-item-2">
                                    <div class="p-3 sm:p-0">
                                        <div>
                                            <div class="-m-1.5 overflow-x-auto">
                                                <div class="p-1.5 min-w-full inline-block align-middle">
                                                    <div class="border rounded-lg divide-y divide-gray-300 ">
                                                        <div class="py-3 px-4 grid grid-cols-2">
                                                            <div class="relative max-w-xs">
                                                                <label for="hs-table-search"
                                                                    class="sr-only">Search</label>
                                                                <input type="text" name="hs-table-search"
                                                                    id="hs-table-search"
                                                                    class=" transition mt-1 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200"
                                                                    placeholder="Search for items">
                                                                <div
                                                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                                    <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <circle cx="11" cy="11" r="8">
                                                                        </circle>
                                                                        <path d="m21 21-4.3-4.3"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="overflow-hidden border rounded-lg shadow-md ">
                                                            <table class="min-w-full divide-y text-center divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            No</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Tempat</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Tanggal</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Jenis Panen</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Berat</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Harga</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Total</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                                            Keterangan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-penjualan-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Lelangan 1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Juni 2023</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Cabai Rawit</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            30 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 50.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 1.500.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Potongan 0.5 Kg</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-penjualan-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            2</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Lelangan 1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Juni 2023</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Cabai Rawit</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            30 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 50.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 1.500.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Potongan 0.5 Kg</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-penjualan-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            3</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Lelangan 1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Juni 2023</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Cabai Rawit</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            30 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 50.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 1.500.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Potongan 0.5 Kg</td>
                                                                    </tr>
                                                                    <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100"
                                                                        data-hs-overlay="#detail-penjualan-modal"
                                                                        data-hs-overlay-options='{"isClosePrev": false}'>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            4</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Lelangan 1</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            12 Juni 2023</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Cabai Rawit</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            30 Kg</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 50.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Rp 1.500.000</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            Potongan 0.5 Kg</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="py-1 px-4">
                                                            <nav class="flex items-center space-x-1">
                                                                <button type="button"
                                                                    class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                                                                    <span aria-hidden="true">«</span>
                                                                    <span class="sr-only">Previous</span>
                                                                </button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none "
                                                                    aria-current="page">1</button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none">2</button>
                                                                <button type="button"
                                                                    class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none">3</button>
                                                                <button type="button"
                                                                    class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                                                                    <span class="sr-only">Next</span>
                                                                    <span aria-hidden="true">»</span>
                                                                </button>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="items-center gap-x-2 py-3 px-4 border-t grid grid-cols-2">
                            <div class="justify-start">
                                <button type="button"
                                    class="transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#detail-modal">
                                    Close
                                </button>
                            </div>
                            <div class="flex justify-end">
                                <a href="#"
                                    class=" transition py-2 px-3 inline-flex items-left gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--detail-panen-->
            <div id="detail-panen-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4 border-b">
                            <h3 class="font-bold text-gray-800">
                                Detail Panen
                            </h3>
                            <button type="button"
                                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#detail-panen-modal">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Tanggal Panen</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">12 Maret 2024
                                    </td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Berat Panen</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">12 Mei 2024
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                            <button type="button"
                                class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#detail-panen-modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--detail-penjualan-->
            <div id="detail-penjualan-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4 border-b">
                            <h3 class="font-bold text-gray-800">
                                Detail Penjualan
                            </h3>
                            <button type="button"
                                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#detail-penjualan-modal">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Tempat</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">Lelangan 1
                                    </td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Tanggal</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">12 Mei 2024
                                    </td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Berat Jual</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">30 Kg</td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Harga/Kg</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">Rp 50.000</td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Total</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">Rp 1.500.000
                                    </td>
                                </tr>
                                <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">
                                        Keterangan</td>
                                    <td class="px-3 py-4 text-left whitespace-nowrap text-sm font-medium text-gray-800">:
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-800">-</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                            <button type="button"
                                class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#detail-penjualan-modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
