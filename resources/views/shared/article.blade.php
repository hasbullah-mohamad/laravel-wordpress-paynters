<div class="py-6 py-md-8">
  <div class="container">
    
    @if ($media)
      <a href="{{ $media->url() }}" class="mb-5">
        <i class="icon icon-arrow-left d-inline-block align-middle"></i>
        <span class="font-size-lg">Back to media</span>
      </a>
    @endif

    <div class="row mb-8">
      <div class="col-lg-8">
        <div class="post-header pattern-lattice-secondary pattern-lattice-fill">
          <h4 class="text-info">{{ $title }}</h4>
          
          @foreach($categories as $cat)
            @include ('shared.svgs.icon-media-event', ['class' => 'svg-icon svg-icon-dark'])
            <srong>{{ $cat->term->name }} </strong>
            &nbsp;
          @endforeach

          |&nbsp;

          {{ $date }}

          @if ($image)
            <img class="w-100 mt-3" src="{{ $image }}" alt="{{ $title }}" />
          @endif

        </div>
        <div class="post-content mt-5">
          {!! $content !!}
        </div>
      </div>

      @if ($latest->count())
      
        <div class="col-lg-4 pl-lg-10 pl-sm-1">
          <h5 class="mb-4 text-info">Latest posts</h5>

          @foreach ($latest->get() as $post)
            <div class="mb-5 text-info">
              @include ('components.card-latest', compact('post'))
            </div>
          @endforeach
          
          
        </div>

      @endif

    </div>
  </div>
</div>