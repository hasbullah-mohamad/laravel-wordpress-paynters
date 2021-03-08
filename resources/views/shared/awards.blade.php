@if ($awards = App\Models\ProjectsAwards::featured() and $awards->count())
  
  <div class="text-white bg-info bg-lattice-info awards">
    <div class="container container-plus">
      <div class="row">
        <div class="col-lg-6 px-0 pl-sm-4 pr-sm-4">
          <div class="awards-slider border-md-triangle clip-md-triangle ">

            @foreach($awards->get() as $award)
              @include ('components.slide-awards', $award->toArray())
            @endforeach

          </div>
        </div>
        <div class="col-lg-6 py-4 py-xl-10 pl-lg-4">
          <div class="awards-control">
          </div>
          <div class="d-flex mb-4">
            @include ('shared.svgs.icon-trophy', ['class' => 'svg-icon svg-icon-lg'])
            <h4 class="d-inline-block mb-0 ml-2">Awards</h4>
          </div>
          <div class="awards-content">
          </div>
          <a href="/awards/" class="btn btn-primary btn-icon awards-href">
            <span>See our wins</span>
            <i class="icon icon-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

@endif
