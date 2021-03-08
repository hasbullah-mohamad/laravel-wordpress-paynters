<div class="card card-featured d-flex shadow-lg bg-white">
  <div class="d-flex flex-lg-row flex-column">

    @if ($image = $post->featuredImage('large'))
      <div class="flex-image" style="flex: 1 0 32em; background-image: url({{ $image }})">
        <img src="{{ $image }}"/>
      </div>
    @endif

    <div>
      <div class="card-body pr-5">
        <small class="d-block my-3 text-info">

          @foreach ($post->terms('category') as $category)
            @include ('shared.svgs.icon-media-news', ['class' => 'svg-icon svg-icon-sm svg-icon-info'])
            <strong class="mx-2 uc">{{ $category->term->name }} </strong>|
          @endforeach

          <span class="mx-2">{{ $post->date() }}</span>
        </small>
        <h4 class="mb-4 text-info">{{ $post->title }}</h4>
        <div class="card-text">
          <p>{{ $post->excerpt() }}</p>
        </div>
      </div>
      <div class="card-footer border-0 text-right bg-white pr-5 pb-5">
        <a href="{{ $post->url() }}" class="btn btn-outline-primary">Read more</a>
      </div>
    </div>
  </div>
</div>