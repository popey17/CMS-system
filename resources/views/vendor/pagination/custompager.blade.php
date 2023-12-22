@if ($paginator->hasPages())
    <nav>
        <ul class="pagination custom">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="custom_item">
                    <span aria-disabled="true" class="item disabled"><i class="fa-solid fa-angle-left"></i>PREV</span>    
                </li>
            @else
                <li>
                    <a class="item" href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i>PREV</a>
                </li>
            @endif


            <li class="page-elements">
                <ul>
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="" aria-disabled="true"><span class="item dot_disabled">{{ $element }}</span></li>
                        @endif
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li  aria-current="page"><span class="item active">{{ $page }}</span></li>
                                @else
                                    <li aria-current="page" ><a href="{{ $url }}" class="item">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach    
                </ul>                            
            </li>
            

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="item" href="{{ $paginator->nextPageUrl() }}">NEXT<i class="fa-solid fa-angle-right"></i></a>
                </li> 
            @else
                <li class="custom_item">
                    <span aria-disabled="true" class="item disabled">NEXT<i class="fa-solid fa-angle-right"></i></span>
                </li>
            @endif 
        </ul>
    </nav>
@endif