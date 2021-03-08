<div class="section section-hero section-hero-{{ $template_style ?? 'main' }}">
  <div class="hero hero-{{ $template_style ?? 'main' }}"
    style="background-image: url('{{ $data->featured_image }}');">
    @if (isset($data->title) && !empty($data->title))
      <div class="hero-overlay d-lg-flex d-none">
        <h3 class="hero-title">{{ $data->title }}</h3>
      </div>
    @endif
  </div>
</div>