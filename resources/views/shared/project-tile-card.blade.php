<div class="home-tile-wrap-item" data-timemark="{{ $timemark }}">

  @if(isset($url))
    <a class="card-project-tile card card-triangle shadow" href="{{ $url }}" data-toggle="modal" data-target="#modal-project-detail">
  @else
    <div class="card-project-tile card card-triangle shadow">
  @endif

    <div class="card-body mx-4 mx-md-6 mt-4 mt-md-6 mb-2 mb-md-3">
      <span class="text-info">{{ $categories }}</span>
      <h5 class="h4-md text-info">{{ $title }}</h5>
      <div class="d-flex justify-content-between align-item-center flex-md-row flex-column">
        <div class="mb-2 mb-md-3">
          @include ('shared.svgs.icon-location', ['class' => 'svg-icon svg-icon-info'])
          <span class="text-info">{{ $location }}</span>
        </div>

        @if(isset($construction))
          <i>Under construction</i>
        @else
          <button class="shadow-sm btn btn-primary btn-icon mb-2 mb-md-3">
            <span>See the project</span>
            <i class="icon icon-arrow-right"></i>
          </button>
        @endif
        

      </div>
    </div>

  @if(isset($url))
    </a>
  @else
    </div>
  @endif

</div>
