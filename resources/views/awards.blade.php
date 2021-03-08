@extends('layouts.app')
@section ('content')

  <div class="py-6">
    <div class="container">
      <h1 class="text-info">Awards</h1>


      @foreach($awards as $year => $group)
        <div class="mt-5">
          <h3 id="year-{{ $year }}" class="text-info">{{ $year }}</h3>
          <div class="pattern-lattice-secondary pattern-lattice-sm">
            <div class="row mb-10">

              @foreach($group as $award)
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                  @include ('components.card-award', $award->toArray())
                  
                </div>
              @endforeach

            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>
  @include ('components.modal-project-detail')
@endsection