@if($url)
  <a class="text-info" href="{{ $url }}" data-toggle="modal" data-target="#modal-project-detail">
@else
  <span class="text-info">
@endif

  <div class="card card-award w-100">

    <div class="image w-100" style="background-image: url({{ $thumbnail_url }})">
      <img src="{{ $thumbnail_url }}" />
    </div>

    <div class="card-body d-flex pb-0">
      <div class="card-logo">
        <img class="px-1" src="{{ $badge_url }}"/>
      </div>
      <div class="pl-3">
        <div class="card-text font-size-md font-weight-medium">
            {{ $title }}
        </div>
        <div class="font-size-md mb-2">
          {{ $awarder }}
        </div>
        <div class="font-size-md">
          {{ $subtitle }}
        </div>
      </div>
    </div>

    @if($url)
      <div class="card-footer border-0 text-right bg-white pt-0">
        <a href="{{ $url }}" data-toggle="modal" data-target="#modal-project-detail">
          <span>See the project</span>
          <i class="icon icon-arrow-right d-inline-block align-middle"></i>
        </a>
      </div>
    @endif

  </div>

@if($url)
  </a>
@else
  </span>
@endif