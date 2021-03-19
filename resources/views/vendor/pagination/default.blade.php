@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="pagination__nav">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <svg class='pagination__svg pagination__svg--left'>
                        <use xlink:href='/sprite.svg#arrow'></use>
                    </svg>
                </a>
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__link active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class='pagination__link'><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            <li class="pagination__nav">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <svg class='pagination__svg pagination__svg--right'>
                        <use xlink:href='/sprite.svg#arrow'></use>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
@endif
