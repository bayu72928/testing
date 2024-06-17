@extends('layouts.dashboard')
@section('header-title', 'Tanam & Panen')
@section('content')
<div class="container p-4 mx-auto max-w-screen-xl">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 ">
                <div class="py-3 px-4 grid grid-cols-2">
                  <div class="relative max-w-xs">
                    <label for="hs-table-search" class="sr-only">Search</label>
                    <input type="text" name="hs-table-search" id="hs-table-search" class=" transition mt-3 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200" placeholder="Search for items">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                      <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="container mx-auto py-1 my-1 text-right px-5">
                    <button type="button" class="transition py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-dark text-white hover:bg-secondary disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#tanam-modal">
                        + Tanam
                    </button>
                  </div>
                </div>
            <div class="overflow-hidden border rounded-lg shadow-md ">
              <table class="min-w-full divide-y text-center divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lahan</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Nama Tanaman</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jenis</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tanggal Tanam</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status Panen</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Total Berat Panen</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100 edit-tanam" data-hs-overlay="#detail-modal" data-id="{{$item->id}}" data-lahan="{{$item->lahan}}" data-nama="{{$item->tanaman->nama}}" data-jenis="{{$item->tanaman->jenis}}" data-tanggal="{{$item->tanggal}}" data-ket="{{$item->keterangan}}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$loop->iteration}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->lahan}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->tanaman->nama}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->tanaman->jenis}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{date('d F Y', strtotime($item->tanggal))}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold 
                      @switch($item->status)
                          @case('waiting')
                              text-yellow-400
                              @break
                          @case('ongoing')
                              text-green-600
                              @break
                          @case('done')
                              text-blue-600
                              @break
                          @case('failed')
                              text-red-600
                              @break
                          @default
                              text-gray-600
                      @endswitch">
                      {{$item->status}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->panen->sum('berat')}} Kg</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->keterangan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="py-1 px-4">
              {{ $data->links('pagination::tailwind') }}
              </div>
          </div>
        </div>
      </div>
      <!--Tanam-->
      <div id="tanam-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
          <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
              <h3 class="font-bold text-gray-800">
                Input Data Penanaman
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#tanam-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="/pertanian/store" method="post">
              @csrf
                <div class="p-4 overflow-y-auto bg-gray-200">
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="lahan" id="" placeholder="Lahan" required>
                    <select name="nama_tanaman" id="nama_tanaman" class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" required>
                        <option selected value="">Pilih Nama Tanaman</option>
                        @foreach($optionTanaman as $tanaman)
                            <option value="{{ $tanaman }}">{{ $tanaman }}</option>
                        @endforeach
                    </select>
                    <select class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" name="jenis_tanaman" id="jenis_tanaman" disabled required>
                        <option value="">Pilih Jenis Tanaman</option>
                    </select>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal Tanam" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan" >
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class=" transition mr-40 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#tanam-modal">
                        Close
                    </button>
                    <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                </div>
            </form>
          </div>
        </div>
      </div>
      <!--Detail-->
        <div id="detail-modal" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/50 hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-screen-lg sm:w-full m-3 sm:mx-auto">
            <form action="" method="post">
              <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4">
                <h3 class="font-bold text-gray-800">
                    Detail
                </h3>
                <button type="button" class="transition flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#detail-modal">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                    </svg>
                </button>
                </div>
                <div class="container rounded-xl flex flex-col gap-3 bg-gray-300 pb-4 shadow-lg">
                    <div class="p-4 overflow-y-auto">
                      @csrf
                      <input type="hidden" name="id" value="">
                      <input class="transition mx-auto mt-3 py-2 px-3 ps-9 w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="lahan" id="" placeholder="Lahan" required>
                      <select name="nama_tanaman" id="nama_tanaman" class="transition mx-auto mt-3 py-2 px-3 ps-9 w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" required>
                          <option selected value="">Pilih Nama Tanaman</option>
                          @foreach($optionTanaman as $tanaman)
                              <option value="{{ $tanaman }}">{{ $tanaman }}</option>
                          @endforeach
                      </select>
                      <select class="transition mx-auto mt-3 py-2 px-3 ps-9 w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" name="jenis_tanaman" id="jenis_tanaman" disabled required>
                          <option value="">Pilih Jenis Tanaman</option>
                      </select>
                      <input class="transition mx-auto mt-3 py-2 px-3 ps-9 w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal Tanam" required>
                      <input class="transition mx-auto mt-3 py-2 px-3 ps-9 w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan" >
                    </div>
                </div>
                <div class="-mt-5 rounded-xl p-4 overflow-y-auto bg-gray-200 shadow-md">
                    <div>
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg divide-y divide-gray-200 ">
                                    <div class="py-3 px-4 grid grid-cols-2">
                                    <div class="relative max-w-xs">
                                        <label for="hs-table-search" class="sr-only">Search</label>
                                        <input type="text" name="hs-table-search" id="hs-table-search" class=" transition mt-2 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200" placeholder="Search for items">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                        <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                        </div>
                                    </div>
                                    <div class="container mx-auto py-1 my-1 text-right px-5">
                                    <button type="button" class="transition py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none tambah-panen" data-hs-overlay="#panen-modal" data-hs-overlay-options='{"isClosePrev": false}'>
                                        + Panen
                                    </button>
                                    </div>
                                    </div>
                                <div class="overflow-hidden border rounded-lg shadow-md ">
                                <table class="min-w-full divide-y text-center divide-gray-200" id="harvestTable">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tanggal Panen</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Berat</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                </div>
                                <div class="py-1 px-4">
                                  {{-- pagination --}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-center gap-x-2 py-3 px-4 border-t grid grid-cols-2">
                  <div class="justify-start">
                  </div>
                  <div class="flex justify-end">
                    <a href="#" id="delete-tanam" class=" transition mx-4 py-2 px-3 inline-flex items-left gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                    <input type="submit" class=" cursor-pointer transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                  </div>
                </div>
              </form>
              <div class="items-center gap-x-2 py-3 px-4 border-t grid grid-cols-2">
                <div class="justify-start">
                  <button type="button" class="transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#detail-modal">
                    Close
                  </button>
                </div>
                <div class="container mx-auto py-1 my-1 text-right px-5">
                  <form action="/pertanian/done" method="post">
                    @csrf
                    <input id="finish" name="id" type="hidden" value="">
                    <input type="submit" value="Panen Selesai" class="cursor-pointer transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!--Panen-->
        <div id="panen-modal" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/70 hidden size-full fixed top-0 start-0 z-[70] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
              <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                  <h3 class="font-bold text-gray-800">
                      Input Data Panen
                  </h3>
                  <button type="button" class="transition flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#panen-modal" data-hs-overlay-options='{"isClosePrev": false}'>
                      <span class="sr-only">Close</span>
                      <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                      </svg>
                  </button>
                </div>
                <div class="p-4 overflow-y-auto">
                <form action="/panen/store" method="post">
                  @csrf
                        <div class="p-4 overflow-y-auto bg-gray-200">
                            <input type="hidden" name="id" value="">
                            <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal" required>
                            <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="berat" id="" placeholder="Berat" required>
                            <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan">
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                            <button type="button" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#panen-modal">
                                Close
                            </button>
                            <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                        </div>
                </form>
                </div>
            </div>
            </div>
        </div>
      <!--edit-panen-->
      <div id="edit-panen-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
          <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
              <h3 class="font-bold text-gray-800">
                Edit Data Panen
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#edit-panen-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="" method="post">
                <div class="p-4 overflow-y-auto bg-gray-200">
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="berat" id="" placeholder="Berat" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan">
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class=" transition mr-24 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#edit-panen-modal">
                        Close
                    </button>
                    <a href="#" id="delete-panen" class=" transition py-2 px-3 inline-flex items-left gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                    <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                </div>
            </form>
          </div>
        </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.getElementById('nama_tanaman').addEventListener('change', function() {
        var selectedTanamanNama = this.value;
        fetch('/get-jenis-tanaman/' + selectedTanamanNama)
            .then(response => response.json())
            .then(data => {
                var jenisTanamanSelect = document.getElementById('jenis_tanaman');
                jenisTanamanSelect.innerHTML = '<option value="">Pilih Jenis Tanaman</option>';

                data.forEach(jenis => {
                    jenisTanamanSelect.innerHTML += '<option value="' + jenis + '">' + jenis + '</option>';
                });

                jenisTanamanSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
    $(document).ready(function() {
      var tanamId=null;
      $('.edit-tanam').click(function() {
          var id = $(this).data('id');
          var lahan = $(this).data('lahan');
          var nama = $(this).data('nama');
          var jenis = $(this).data('jenis');
          var tanggal = $(this).data('tanggal');
          var ket = $(this).data('ket');
          var tableBody = $('#harvestTable tbody');
          

          tanamId = $(this).data('id');
          tableBody.empty();
          
          $('#detail-modal input[name="id"]').val(id);
          $('#detail-modal input[name="lahan"]').val(lahan);
          $('#detail-modal input[name="nama"]').val(nama);
          $('#detail-modal input[name="jenis"]').val(jenis);
          $('#detail-modal input[name="tanggal"]').val(tanggal);
          $('#detail-modal input[name="keterangan"]').val(ket);

          fetch('/get-data-panen/' + id)
            .then(response => response.json())
            .then(data => {
                data.forEach(panen => {
                  console.log(panen.tanggal);
                  var row = '<tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100 edit-panen" data-hs-overlay="#edit-panen-modal" data-id="'+panen.id+'" data-tanggal="'+panen.tanggal+'" data-berat="'+panen.berat+'" data-ket="'+panen.keterangan+'" data-hs-overlay-options="{&quot;isClosePrev&quot;: false}">' +
                  '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' + panen.id + '</td>' +
                  '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' + panen.tanggal + '</td>' +
                  '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' + panen.berat + '</td>' +
                  '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">' + panen.keterangan + '</td>' +
                  '</tr>';
                    tableBody.append(row);
                    if (window.hs && window.hs.overlay) {
                      window.hs.overlay.initialize();
                  }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });

          $('#delete').attr('href','/pertanian/delete/'+id);
          $('#finish').attr('value', id);

          $('#detail-modal').removeClass('hidden');
      });
      $('.tambah-panen').click(function() {
        $('#panen-modal input[name="id"]').val(tanamId);
      });
      $('.edit-panen').click(function() {
          var id = $(this).data('id');
          var tanggal = $(this).data('tanggal');
          var berat = $(this).data('berat');
          var ket = $(this).data('ket');
          
          $('#edit-panen-modal input[name="id"]').val(id);
          $('#edit-panen-modal input[name="tanggal"]').val(tanggal);
          $('#edit-panen-modal input[name="berat"]').val(berat);
          $('#edit-panen-modal input[name="keterangan"]').val(ket);


          $('#delete-panen').attr('href','/pertanian/delete/'+id);

          $('#edit-panen-modal').removeClass('hidden');
      });
  });
</script>
@endsection