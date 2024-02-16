@if ($paginator->hasPages())
    <ul class="pagination">
        <li class="page-item {{ ($paginator->onFirstPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        </li>

        @foreach ($elements as $element)
           @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ ($page == $paginator->currentPage()) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach

        <li class="page-item {{ ($paginator->hasMorePages()) ? '' : ' disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        </li>
    </ul>
@endif
