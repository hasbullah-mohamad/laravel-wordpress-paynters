<div class="card w-100 card-media shadow-sm">

  <div class="image w-100" style="background-image: url({{ $post->featuredImage('large') }})">
    <img src="{{ $post->featuredImage('large') }}" />
  </div>


  <div class="card-body text-info">
    <small class="d-block">

      @foreach($post->terms('category') as $cat)
        <img class="svg-icon svg-icon-sm svg-icon-info" src="{{ asset('/dist/media/media-type-'.sanitize_title($cat->term->slug).'.svg') }}"/>
        <strong>{{ $cat->term->name }} |</strong> 
      @endforeach
      

      {{ $post->date() }}
    </small>
    <p class="card-text font-size-lg font-weight-medium">
      @if($q = request()->q and strlen($q) > 2)
        {!! preg_replace( '/' . preg_quote($q) . '/i' , '<mark>$0</mark>', $post->title) !!}
      @else
        {{ $post->title }}
      @endif
    </p>
  </div>
  <div class="card-footer border-0 text-right bg-white mb-2">
    <a href="{{ $post->url() }}" class="btn btn-outline-primary">Read more</a>
  </div>
</div>