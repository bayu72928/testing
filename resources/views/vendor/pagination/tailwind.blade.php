@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center space-x-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button type="button" class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none" disabled>
                <span aria-hidden="true">«</span>
                <span class="sr-only">Previous</span>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-300">
                <span aria-hidden="true">«</span>
                <span class="sr-only">Previous</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="min-w-[40px] flex justify-center items-center text-gray-800 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 bg-gray-200 py-2.5 text-sm rounded-full" aria-current="page">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="transition min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-300 py-2.5 text-sm rounded-full">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="transition p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-300">
                <span class="sr-only">Next</span>
                <span aria-hidden="true">»</span>
            </a>
        @else
            <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-300 disabled:opacity-50 disabled:pointer-events-none" disabled>
                <span class="sr-only">Next</span>
                <span aria-hidden="true">»</span>
            </button>
        @endif
    </nav>
@endif
