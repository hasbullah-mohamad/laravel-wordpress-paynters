@if ($projects->count())

  <div>
    <div class="container container-plus clearfix py-6 py-md-10">
      <div class="floating floating-projects">
        <div class="floating-left">
          <h3 class="d-block d-xl-none mb-3 text-info">Projects</h3>
          <div class="floating-card">
            <h4 class="text-info">Projects</h4>
            <ul class="list-categories">
              @foreach($categories as $category)
                <li><a class="{{ $category->active ? 'active' : '' }}" href="/projects/?category={{ $category->id }}">{!! $category->name !!}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="floating-content">
          <div class="row">
            @foreach($projects as $project)
              <div class="col-md-6 mb-4 mb-md-5 px-3 d-flex">
                @include ('components.card-project', $project->toArray())
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="text-right">
        <a href="/projects/?category=all" class="btn btn-primary btn-icon d-block d-md-inline-block">
          <span>See all projects</span>
          <i class="icon icon-arrow-right"></i>
        </a>
      </div>
    </div>
    <div class="container d-block d-md-none">
      <hr class="bg-separator" />
    </div>
  </div>

@endif