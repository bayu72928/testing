@extends('layouts.dashboard')
@section('header-title', 'Tanaman')
@section('content')
<div class="container p-4 mx-auto max-w-screen-xl">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 ">
                <div class="py-3 px-4 grid grid-cols-2">
                  <div class="relative max-w-xs">
                    <form action="/tanaman/search" method="get">
                      @csrf
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
                        + Tanaman
                      </button>
                  </div>
                </div>
            <div class="overflow-hidden border rounded-lg shadow-md ">
              <table class="min-w-full divide-y text-center divide-gray-200">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">No</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jenis</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tanamans as $tanaman)
                  <tr class="transition cursor-pointer odd:bg-white even:bg-gray-100 hover:bg-gray-100 edit-modal" data-hs-overlay="#edit-modal" data-id="{{$tanaman->id}}" data-nama="{{$tanaman->nama}}" data-jenis="{{$tanaman->jenis}}" data-keterangan="{{$tanaman->keterangan}}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$loop->iteration}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$tanaman->nama}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$tanaman->jenis}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$tanaman->keterangan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="py-1 px-4">
              {{ $tanamans->links('pagination::tailwind') }} 
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
                Input Tanaman
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#input-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="/tanaman/store" method="post">
              @csrf
                <div class="p-4 overflow-y-auto bg-gray-200">
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="nama" id="" placeholder="Nama Tanaman" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="jenis" id="" placeholder="Jenis" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="ket" id="" placeholder="Keterangan">
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
                Edit Tanaman
              </h3>
              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#edit-modal">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
            <form action="/tanaman/update" method="post">
              @csrf
                <div class="p-4 overflow-y-auto bg-gray-200">
                    <input type="hidden" name="id" value="">
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="nama" id="" placeholder="Nama Tanaman" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="jenis" id="" placeholder="Jenis" required>
                    <input class="transition mx-auto mt-3 py-2 px-3 ps-9 block w-80 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:bg-gray-100" type="text" name="ket" id="" placeholder="Keterangan">
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class=" transition mr-24 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#edit-modal">
                        Close
                    </button>
                    <a href="#" id="delete" class=" transition py-2 px-3 inline-flex items-left gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                    <input type="submit" class=" transition py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Save Changes">
                </div>
            </form>
          </div>
        </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
      $('.edit-modal').click(function() {
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          var jenis = $(this).data('jenis');
          var ket = $(this).data('keterangan');
          
          $('#edit-modal input[name="id"]').val(id);
          $('#edit-modal input[name="nama"]').val(nama);
          $('#edit-modal input[name="jenis"]').val(jenis);
          $('#edit-modal input[name="ket"]').val(ket);
          $('#delete').attr('href','/tanaman/delete/'+id);
          
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