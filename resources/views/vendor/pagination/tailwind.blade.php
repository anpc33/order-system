@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-end">
    <ul class="inline-flex items-center space-x-1 text-sm">

        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())
        <li class="px-3 py-1 bg-gray-100 text-gray-400 rounded">‹</li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-3 py-1 bg-white text-gray-700 border rounded hover:bg-gray-200">‹</a>
        </li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="px-3 py-1 text-gray-500">{{ $element }}</li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        <li>
            @if ($page == $paginator->currentPage())
            <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $page }}</span>
            @else
            <a href="{{ $url }}" class="px-3 py-1 bg-white border text-gray-700 rounded hover:bg-gray-100">{{ $page
                }}</a>
            @endif
        </li>
        @endforeach
        @endif
        @endforeach

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-3 py-1 bg-white text-gray-700 border rounded hover:bg-gray-200">›</a>
        </li>
        @else
        <li class="px-3 py-1 bg-gray-100 text-gray-400 rounded">›</li>
        @endif
    </ul>
</nav>
@endif