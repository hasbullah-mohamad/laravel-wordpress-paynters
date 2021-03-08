<div class="card card-latest shadow-sm">
  <div class="card-body">
    <small class="d-block">

      @foreach($post->terms('category') as $cat)
        <img class="svg-icon svg-icon-sm svg-icon-info" src="{{ asset('/dist/media/media-type-'.sanitize_title($cat->term->slug).'.svg') }}"/>
        <strong>{{ $cat->term->name }}</strong> 
      @endforeach

      | {{ $post->date() }}

    </small>
    <p class="card-text font-size-lg font-weight-medium">
      {{ $post->title }}
    </p>
  </div>
  <div class="card-footer border-0 text-right bg-white">
    <a href="{{ $post->url() }}">
      <span>See more</span>
      <i class="icon icon-arrow-right d-inline-block align-middle"></i>
    </a>
  </div>
</div>