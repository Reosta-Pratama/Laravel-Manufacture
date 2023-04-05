@if ($paginator->hasPages())
<link rel="stylesheet" href="{{ asset('assets/css/paginate.css') }}">
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled icon">
                <a class="page-link" href="#" tabindex="-1"><i class="fa-solid fa-angle-left"></i></a>
            </li>
        @else
            <li class="page-item  icon"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active link-number">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item link-number">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item  icon">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa-solid fa-angle-right"></i></a>
            </li>
        @else
            <li class="page-item disabled icon">
                <a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a>
            </li>
        @endif
    </ul>
@endif