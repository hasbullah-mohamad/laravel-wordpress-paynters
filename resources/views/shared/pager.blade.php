@if (count($pager) > 1)
  <div class="mb-5">
    <ul class="pagination justify-content-center">
      <li class="page-item {{ $page > 1 ? '' : 'disabled' }}">
        <a href="?{{ http_build_query(['page' => $page - 1] + $query) }}" class="page-link bg-secondary" aria-label="Previous">
          <span aria-hidden="true" class="icon-sm icon-chevron-left"></span>
        </a>
      </li>
      @foreach($pager as $item)
        <li class="page-item {{ $item->active ? 'active' : '' }}"><a href="{{ $item->url }}" class="page-link text-info">{{ $item->page }}</a></li>
      @endforeach
      <li class="page-item {{ $page + 1 > $total ? 'disabled' : '' }}">
        <a href="?{{ http_build_query(['page' => $page + 1] + $query) }}" class="page-link bg-secondary" aria-label="Next">
          <span aria-hidden="true" class="icon-sm icon-chevron-right"></span>
        </a>
      </li>
    </ul>
  </div>
@endif