@extends('layouts.app')
@section ('content')
  <div class="py-6">
    <div class="container">
      <h3 class="text-info">{{ the_title() }}</h3>
      <div class="post-header mb-4">
        {!! $page->content('intro') !!}
      </div>
      <div class="row">
        <div class="col-xl-8 col-lg-7 col-md-6">
          @include ('shared.post-careers')
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 mb-4 pl-lg-10">
          <h5 class="mb-3 text-info">Job listings</h5>
          
          @if($jobs = $page->field('jobs', []))
            @foreach($jobs as $job)
              <div class="mb-4">
                @include ('components.card-job', [
                  'data' => (object)([
                    'post_date' => $job['post_date'],
                    'category' => $job['category'],
                    'link' => $job['link'],
                    'title' => $job['title'],
                    'location' => $job['location'],
                    'working_hours' => $job['working_hours']
                  ])
                ])
              </div>
            @endforeach
          @else
            <p>{{ $page->field('no_jobs_message') }}</p>
          @endif

        </div>
      </div>
    </div>
  </div>
@endsection