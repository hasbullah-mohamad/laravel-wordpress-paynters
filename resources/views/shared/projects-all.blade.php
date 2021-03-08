<div class="py-6">
  <div class="container">
    <div class="row align-items-baseline mb-4">
      <div class="col-lg-6">
        <h3 class="text-info">Projects</h3>
      </div>

      <form action="." class="col-lg-6">
        <div class="row">
          <div class="col-lg-6 pr-lg-2 mb-3">
            <select name="region" class="custom-select w-100" onChange="this.form.submit()">
              <option value="">{{ request()->region ? 'All' : 'Select Region' }}</option>
              @foreach($regions as $region)
                <option {{ $region->id == request()->region ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-6 pl-lg-2 mb-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend border-right-0">
                <button class="btn border border-right-0 input-group-text py-0 px-1 bg-white text-info">
                  <i class="icon-sm icon-search"></i>
                </button>
              </div>
              <input name="q" type="text" class="form-control pl-1" placeholder="Search" value="{{ request()->q }}" />
            </div>
          </div>
        </div>
      </form>
      
    </div>

    @if ($projects->count())
      <div class="floating">
        <div class="floating-left">
          <div class="floating-card">
            <ul class="list-categories">
              @foreach($categories as $category)
                <li><a class="{{ $category->active ? 'active' : '' }}" href="{{ $category->url }}">{!! $category->name !!}</a></li>
                @if($loop->first)
                  <li><a class="{{ request()->category == 'all' ? 'active' : '' }}" href="./?category=all">All projects</a></li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>

        <div class="floating-content">
          <div class="row px-1 mb-5" data-load-more-container>
              <!-- load-more-items-begin -->
              @foreach($projects as $project)
                  <div class="col-md-6 mb-4 mb-md-5 px-3 d-flex">
                    @include ('components.card-project', $project->toArray() + ['request' => request()->all()])
                  </div>
              @endforeach
              <!-- load-more-items-end -->
          </div>
          @if($total > $page)
            <p data-load-more-trigger>
              <a data-load-more href="?{{ http_build_query(['page' => $page + 1] + request()->all()) }}">Loading more..</a>
            </p>
          @endif
        </div>
      </div>
    @else
      <p>No projects available.</p>
    @endif


  </div>
</div>