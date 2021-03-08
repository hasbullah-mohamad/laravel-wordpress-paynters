<a class="d-flex w-100" href="{{ $post->url() }}">
  <div class="card card-news bg-secondary w-100">

    <span class="image" style="background-image: url({{ $post->featuredImage('large') }})">
      <img src="{{ $post->featuredImage('large') }}" alt="{{ $post->title }}" /> 
    </span>
    
    <div class="card-body">
      <span class="mb-2 d-block text-info font-weight-medium font-size-sm letter-spacing-sm">
        {{ $post->date() }}
      </span>
      <p class="card-text font-size-lg font-weight-medium text-info">
        {{ $post->title }}
      </p>
    </div>
    <div class="card-footer border-0 text-right bg-secondary mb-2">
      <button class="btn btn-outline-primary">Read more</button>
    </div>
  </div>
</a>