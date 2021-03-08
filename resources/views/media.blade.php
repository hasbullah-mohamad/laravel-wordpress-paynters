@extends('layouts.app')
@section ('content')
<div class="pt-6 pb-12">
  <div class="container">
    <div class="row align-items-baseline mb-4">
      <div class="col-lg-9">
        <h3 class="text-info mb-4">Media</h3>
      </div>
      <div class="col-lg-3">
        <form class="input-group mb-3" action=".">
          <div class="input-group-prepend text-right">
            <button class="btn border border-right-0 input-group-text py-0 px-1 bg-white text-info">
              <i class="icon-sm icon-search"></i>
            </button>
          </div>
          <input name="q" type="text" class="form-control pl-1" placeholder="Search" value="{{ request()->q }}">
        </form>
      </div>
    </div>

    @if ($sticky)
      <div class="row mb-3 text-uppercase letter-spacing">
        Featured
      </div>
      <div class="mb-6 pattern-lattice-secondary pattern-lattice-base">
        @include ('components.card-featured', ['post' => $sticky])
      </div>
    @endif
    

    <div class="floating">
      <div class="floating-left">
        <div class="floating-card">
          <h6 class="font-weight-medium">Categories</h6>
          <ul class="list-categories">
            <li><a href="." class="{{ request()->category ? '' : 'active' }}">All Articles</a></li>
            @foreach ($categories->get() as $category)
              <li><a class="{{ request()->category == $category->id ? 'active' : '' }}" href="?category={{ $category->id }}">{!! $category->name !!}</a></li>
            @endforeach
          </ul>
          <h6 class="mt-4 font-weight-medium">Year</h6>
          <select class="custom-select custom-select-sm" onChange="window.location = './?year='+this.value+'{{ request()->category ? '&category='.request()->category : '' }}'">
            <option value="">All</option>
            @foreach ($years->get() as $row)
              <option value="{{ $row->year }}" {{ $row->year == request()->year ? 'selected' : '' }} >{{ $row->year }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="floating-content">
        <div class="row mb-5">
          @foreach($posts->get() as $post)
            <div class="col-md-6 mb-5 d-flex">
              @include ('components.card-media', compact('post') + [
                'data' => (object)([
                  'media_icon' => asset('/dist/media/media-type-PUBLICATION.svg'),
                ])
              ])
            </div>
          @endforeach
        </div>

        @include ('shared.pager')

      </div>
    </div>
  </div>
</div>
@endsection