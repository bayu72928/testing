@extends('layouts.dashboard')
@section('header-title', 'Penjualan')
@section('content')
<div class="container p-4 mx-auto max-w-screen-xl">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 ">
                <div class="py-3 px-4 grid grid-cols-2">
                  <div class="relative max-w-xs">
                    <form action="/penjualan/search" method="get">
                      <label for="hs-table-search" class="sr-only">Search</label>
                      <input type="text" name="search" id="hs-table-search" class=" transition mt-3 py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none  hover:bg-gray-200" placeholder="Search for items">
                      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                        <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="11" cy="11" r="8"></circle>
                          <path d="m21 21-4.3-4.3"></path>
                        </svg>
                      </div>
                      <input type="submit" id="submit" value="submit" class="hidden">
                    </form>
                  </div>
                  <div class="container mx-auto py-1 my-1 text-right px-5">
                    <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-dark text-white hover:bg-secondary disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#input-modal">
                        + Penjualan
                      </button>
                  </div>
                </div>
            <div class="overflow-hidden border rounded-lg shadow-md ">
              <table class="min-w-full divide-y text-center divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tempat</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Lahan</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jenis Panen</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Berat</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($penjualan as $item)
                  <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100 edit-penjualan" data-hs-overlay="#edit-modal" data-id="{{ $item->id }}" data-tempat="{{ $item->tempat }}" data-tanggal="{{ $item->tanggal }}" data-lahan="{{ $item->tanam->lahan }}" data-jenisPanen="{{$item->tanam->tanaman->nama}}-{{$item->tanam->tanaman->jenis}}" data-berat="{{ $item->berat }}" data-harga="{{ $item->harga }}" data-total="{{ $item->total }}" data-ket="{{ $item->keterangan }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$loop->iteration}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->tempat}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{date('d F Y', strtotime($item->tanggal))}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->tanam->lahan}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                      {{$item->tanam->tanaman->nama}}  {{$item->tanam->tanaman->jenis}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->berat}} Kg</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{$item->harga}} /Kg</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{$item->total}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$item->keterangan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="py-1 px-4">
              {{ $penjualan->links('pagination::tailwind') }} 
              </div>
          </div>
        </div>
      </div>
      <!--modal-->
      <div id="input-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
          <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
              <h3 class="font-bold text-gray-800">
                Input Penjualan
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#input-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="/penjualan/store" method="post">
              @csrf
                <div class="p-4 overflow-y-auto bg-gray-200">
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="tempat" id="" placeholder="Tempat" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal" required>
                    <select name="lahan" id="lahan" class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" required>
                        <option selected value="">Pilih Lahan</option>
                        @foreach($optionLahan as $lahan)
                            <option value="{{ $lahan }}">{{ $lahan }}</option>
                        @endforeach
                    </select>
                    <select class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" name="jenisPanen" id="jenis-panen" disabled required>
                        <option value="">Pilih Jenis Panen</option>
                    </select>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="berat" id="" placeholder="Berat" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="harga" id="" placeholder="Harga" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan" >
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class=" transition mr-40 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#input-modal">
                        Close
                    </button>
                    <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                </div>
            </form>
            
          </div>
        </div>
      </div>
      <!--edit-->
      <div id="edit-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-96 m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
          <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
              <h3 class="font-bold text-gray-800">
                Edit Penjualan
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#edit-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="/penjualan/update" method="post">
              @csrf
                <div class="p-4 overflow-y-auto bg-gray-200">
                  <input type="hidden" name="id" value="">
                  <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="tempat" id="" placeholder="Tempat" required>
                  <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="date" name="tanggal" id="" placeholder="Tanggal" required>
                  <select name="lahan" id="lahan-edit" class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" required>
                      <option selected value="">Pilih Lahan</option>
                      @foreach($optionLahan as $lahan)
                          <option value="{{ $lahan }}">{{ $lahan }}</option>
                      @endforeach
                  </select>
                  <select class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" name="jenisPanen" id="jenis-panen-edit" disabled required>
                      <option value="">Pilih Jenis Panen</option>
                  </select>
                  <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="berat" id="" placeholder="Berat" required>
                  <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="number" name="harga" id="" placeholder="Harga" required>
                  <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="keterangan" id="" placeholder="Keterangan" >
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class=" transition mr-24 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#edit-modal">
                        Close
                    </button>
                    <a href="" id="delete" class=" transition py-2 px-3 inline-flex items-left gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                    <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                </div>
            </form>
            
          </div>
        </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  document.getElementById('lahan').addEventListener('change', function() {
        var selectedLahan = this.value;
        // Mengambil jenis tanaman berdasarkan ID tanaman yang dipilih
        fetch('/get-jenis-panen/' + selectedLahan)
            .then(response => response.json())
            .then(data => {
                var jenisPanenSelect = document.getElementById('jenis-panen');
                jenisPanenSelect.innerHTML = '<option value="">Pilih Jenis panen</option>';

                // Mengisi opsi jenis tanaman sesuai dengan data yang diterima
                data.forEach(jenis => {
                    let arr = jenis.split("-");
                    jenisPanenSelect.innerHTML += '<option value="' + arr[1] + '">' + jenis + '</option>';
                });

                // Mengaktifkan opsi jenis tanaman
                jenisPanenSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
    document.getElementById('lahan-edit').addEventListener('change', function() {
        var selectedLahan = this.value;
        // Mengambil jenis tanaman berdasarkan ID tanaman yang dipilih
        fetch('/get-jenis-panen/' + selectedLahan)
            .then(response => response.json())
            .then(data => {
                var jenisPanenSelect = document.getElementById('jenis-panen-edit');
                jenisPanenSelect.innerHTML = '<option value="">Pilih Jenis panen</option>';

                // Mengisi opsi jenis tanaman sesuai dengan data yang diterima
                data.forEach(jenis => {
                    let arr = jenis.split("-");
                    jenisPanenSelect.innerHTML += '<option value="' + arr[1] + '">' + jenis + '</option>';
                });

                // Mengaktifkan opsi jenis tanaman
                jenisPanenSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
    $(document).ready(function() {
      $('.edit-penjualan').click(function() {
          var id = $(this).data('id');
          var tempat = $(this).data('tempat');
          var tanggal = $(this).data('tanggal');
          var lahan = $(this).data('lahan');
          var jenisPanen = $(this).data('jenisPanen');
          var berat = $(this).data('berat');
          var harga = $(this).data('harga');
          var total = $(this).data('total');
          var ket = $(this).data('ket');
          
          $('#edit-modal input[name="id"]').val(id);
          $('#edit-modal input[name="tempat"]').val(tempat);
          $('#edit-modal input[name="tanggal"]').val(tanggal);
          $('#edit-modal input[name="lahan"]').val(lahan);
          $('#edit-modal input[name="jenisPanen"]').val(jenisPanen);
          $('#edit-modal input[name="berat"]').val(berat);
          $('#edit-modal input[name="harga"]').val(harga);
          $('#edit-modal input[name="total"]').val(total);
          $('#edit-modal input[name="keterangan"]').val(ket);

          $('#delete').attr('href','/penjualan/delete/'+id);

          $('#edit-modal').removeClass('hidden');
      });
  });
  var input = document.getElementById("hs-table-search");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("submit").click();
    }
  });
</script>
@endsection