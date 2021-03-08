<div class="project-detail" style="background-image: url('{{ $project->featuredImage() }}');">
  <div class="project-detail-scroll">
    
    <div class="project-navigation project-navigation-prev">
      @if ($prev)
      <a class="d-flex align-items-center" href="{{ $prev->url }}{{ empty(request()->all()) ? '' : '?' . http_build_query(request()->all()) }}">
        <i class="icon-arrow-left icon-sm text-light"></i> 
        <span class="font-size-lg text-light">
          Previous
        </span>
      </a>
      @endif
    </div>

    <div class="project-items">
      <div class="project-item project-item-text">
        <!-- /Project Content -->
        <div class="project-content pr-md-8">

          <!-- Awards -->
          @if ($award)
            <div class="bg-white rounded p-4 d-flex align-items-center text-info mb-5">
              <div class="mr-2">
                @include ('shared.svgs.icon-trophy', ['class' => 'svg-icon svg-icon-info svg-icon-lg'])
              </div>
              <div>
                <div class="font-size-lg font-weight-bold line-height-xs">{{ $award->title }}</div>
                <div class="font-size-lg line-height-xs">{{ $award->awarder }}</div>
              </div>
            </div>
          @endif<!-- /Awards -->

          <div>
            <div class="font-size-lg">{!! implode(', ', $categories) !!}</div>
            <h4 class="mb-6">
              {{ $project->title }}
              @if(!$project->completed)
                <small><i><br />(Under construction)</i></small>
              @endif
            </h4>

            @if ($region)
              <div class="d-flex align-items-center mb-4">
                @include ('shared.svgs.icon-location', ['class' => 'svg-icon mr-4'])
                <div class="font-size-lg"> {{ $region }}</div>
              </div>
            @endif

            <div class="text-light project-text">
              {!! $project->content() !!}
            </div>
          </div>
        </div>
      </div><!-- /Project Content -->

      <!-- Project gallery -->
      @if ($gallery)
        @foreach($gallery as $image)
          <div class="project-item">
            {{-- <div class="project-image rounded" style="background-image: url('{{ $image }}');"></div> --}}
            <img class="project-image rounded" src="{{ $image}}" />
          </div>
        @endforeach
      @endif<!-- /Project gallery -->    

    </div><!-- /Project Items -->

    @if ($next)
      <div class="project-navigation project-navigation-next">
        <a href="{{ $next->url }}{{ empty(request()->all()) ? '' : '?' . http_build_query(request()->all()) }}" class="font-size-lg text-light d-flex align-items-center">
          <div>
            Next up
            <h4>{{ $next->title }}</h4>
          </div>
          <i class="icon-arrow-right icon-sm text-light"></i>
        </a>
      </div>
    @endif
  </div>
</div>