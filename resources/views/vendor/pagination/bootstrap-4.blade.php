@if ($paginator->hasPages())
    <div class="wp-pagenavi clearfix">
                {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prevpostslink" href="{{ $paginator->previousPageUrl() }}">Previous</a>
            @else
                <a class="prevpostslink" href="{{ $paginator->previousPageUrl() }}">Previous</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="page" href="#">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="current">{{ $page }}</span>
                        @else
                            <a class="page" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="nextpostslink" href="{{ $paginator->nextPageUrl() }}">Next</a>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
            </div><!--/ .wp-pagenavi-->
@endif
