@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Показаны результаты с') !!}
                    <span class="fw-semibold">{{$paginator->firstItem()}}</span>
                    {!! __('по') !!}
                    <span class="fw-semibold">{{$paginator->lastItem()}}</span>
                    {!! __('из') !!}
                    <span class="fw-semibold">{{$paginator->total()}}</span>
                </p>
            </div>
            {{-- <div>
                <p class="small text-muted">
                    <form method="get" action={{url(Request::url())}}>
                        Элементов на странице:
                        <select name="perpage">
                            <option value="5" @if($paginator->perPage() == 5) selected @endif >5</option>
                            <option value="10" @if($paginator->perPage() == 10) selected @endif >10</option>
                            <option value="15" @if($paginator->perPage() == 15) selected @endif >15</option>
                        </select>
                        <input class="btn btn-primary" type="submit" value="Изменить">
                    </form>
                </p>
            </div> --}}

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{$paginator->previousPageUrl()}}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{$element}}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{$page}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{$paginator->nextPageUrl()}}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
