@if ($posts->count())
  <div class="py-6 py-md-8">
    <div class="container container-plus">
      <div class="d-flex justify-content-between mb-3">
        <h4 class="text-info letter-spacing-sm">The latest</h4>

        @if ($media)
          <a href="{{ $media->url() }}"><span class="font-size-base">See all</span> <i class="icon-sm icon-arrow-right inline-block align-middle"></i></a>
        @endif

      </div>
      <div class="row">
        @foreach ($posts as $post)
          <div class="col-lg-4 col-md-6 mb-4 d-flex">
            @include ('components.card-news', compact('post'))
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endif
