<div class="min-h-screen flex">
    <div class="flex fixed flex-col w-56 bg-white h-full overflow-hidden shadow-lg">
        <div class="flex flex-col items-center justify-center h-56 shadow-md">
            <img src="{{ asset('images/mentani-color.png') }}" alt="Logo" class="h-20 w-auto mb-2">
        </div>
        <ul class="hs-accordion-group flex flex-col py-4" data-hs-accordion-always-open>
            <li>
                <a href="{{ url('/home') }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-home"></i></span>
                    <span class="text-sm font-medium">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/pengeluaran') }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-dollar-circle"></i></span>
                    <span class="text-sm font-medium">Pengeluaran</span>
                </a>
            </li>
            <li class="hs-accordion" id="users-accordion">
                <button class="hs-accordion-toggle hs-accordion-active:text-green-600 hs-accordion-active:hover:bg-transparent flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text">
                      <i class="bx bx-drink"></i></span>
                    <span class="text-sm font-medium">Pertanian</span>
                  <svg class="hs-accordion-active:block ms-auto hidden size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m18 15-6-6-6 6" />
                  </svg>

                  <svg class="hs-accordion-active:hidden ms-auto block size-4 text-gray-600 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m6 9 6 6 6-6" />
                  </svg>
                </button>
                <div id="users-accordion" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                  <ul>
                    <li class="hs-accordion ml-6" id="users-accordion-sub-1">
                      <a href="{{ url('/pertanian') }}"
                          class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                                  class="bx bx-sun"></i></span>
                          <span class="text-sm font-medium">Tanam & Panen</span>
                      </a>
                    </li>
                    <li class="hs-accordion ml-6" id="users-accordion-sub-1">
                      <a href="{{ url('/tanaman') }}"
                          class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" style="fill: #034620;transform: ;msFilter:;"><path d="m21.88 2.15-1.2.4a13.84 13.84 0 0 1-6.41.64 11.87 11.87 0 0 0-6.68.9A7.23 7.23 0 0 0 3.3 9.5a8.65 8.65 0 0 0 1.47 6.6c-.06.21-.12.42-.17.63A22.6 22.6 0 0 0 4 22h2a30.69 30.69 0 0 1 .59-4.32 9.25 9.25 0 0 0 4.52 1.11 11 11 0 0 0 4.28-.87C23 14.67 22 3.86 22 3.41zm-7.27 13.93c-2.61 1.11-5.73.92-7.48-.45a13.79 13.79 0 0 1 1.21-2.84A10.17 10.17 0 0 1 9.73 11a9 9 0 0 1 1.81-1.42A12 12 0 0 1 16 8V7a11.43 11.43 0 0 0-5.26 1.08 10.28 10.28 0 0 0-4.12 3.65 15.07 15.07 0 0 0-1 1.87 7 7 0 0 1-.38-3.73 5.24 5.24 0 0 1 3.14-4 8.93 8.93 0 0 1 3.82-.84c.62 0 1.23.06 1.87.11a16.2 16.2 0 0 0 6-.35C20 7.55 19.5 14 14.61 16.08z"></path></svg>
                          </span>
                          <span class="text-sm font-medium">Tanaman</span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li>
                <a href="{{ url('/penjualan') }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-shopping-bag"></i></span>
                    <span class="text-sm font-medium">Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/laporan') }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-notepad"></i></span>
                    <span class="text-sm font-medium">Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/pengguna') }}"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-user"></i></span>
                    <span class="text-sm font-medium">Pengguna</span>
                </a>
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                    class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-text hover:text-green-600">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-text"><i
                            class="bx bx-log-out"></i></span>
                    <span class="text-sm font-medium">Logout</span>
                </button>
                </form>
            </li>
        </ul>
    </div>
</div>
