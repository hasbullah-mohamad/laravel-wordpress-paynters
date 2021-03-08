<div class="card card-project w-100" style="background-image: url('{{ $thumbnail_url }}')" alt="{{ $title }}">

  <a class="card-project-tile card card-triangle shadow d-md-none" href="{{ $url }}{{ empty($request) ? '' : '?' . http_build_query($request) }}">
    <div class="card-body mx-4 mx-md-6 mt-4 mt-md-6 mb-2 mb-md-3">
      <h5 class="h4-md text-info">{{ $title }}</h5>
      <div class="d-flex justify-content-between align-item-center flex-md-row flex-column">
        <button class="shadow-sm btn btn-primary btn-icon mb-2 mb-md-3">
          <span>See the project</span>
          <i class="icon icon-arrow-right"></i>
        </button>
      </div>
    </div>
  </a>

  <div class="overlay d-none d-md-block">
    <p class="card-text">{{ $title }}</p>
    <a href="{{ $url }}{{ empty($request) ? '' : '?' . http_build_query($request) }}" data-toggle="modal" data-target="#modal-project-detail">
      <span>See More</span>
      <i class="icon icon-arrow-right d-inline-block align-middle"></i>
    </a>
    @if(!empty($awards))
      <div class="icon-prize">
        @include ('shared.svgs.icon-trophy', ['class' => 'svg-icon svg-icon-dark'])
      </div>
    @endif
  </div>

</div>