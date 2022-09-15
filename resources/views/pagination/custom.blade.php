@if ($paginator->hasPages())
    <ul class="pagination is-rounded">

        @if ($paginator->onFirstPage())
            <li><span class="pagination-previous is-disabled">← Previous</span></li>
        @else
            <li><a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="is-disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="pagination-link is-current">{{ $page }}</span></li>
                    @else
                        <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li><span class="pagination-next is-disabled">Next →</span></li>
        @endif
    </ul>
@endif
