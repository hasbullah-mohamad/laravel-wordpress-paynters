<div class="card card-job shadow-sm text-info border-secondary border">
  <div class="card-body">
    <small class="mb-2 d-block">
      <strong>JOB LISTING | </strong>{{ $data->post_date }}
    </small>
    <span class="font-size-md">
      {{ $data->category }}
    </span>
    <p class="card-text font-size-lg font-weight-bold">
      {{ $data->title }}
    </p>
    <div class="mb-2">
      @include ('shared.svgs.icon-location', ['class' => 'svg-icon svg-icon-info'])
      <span class="font-size-md">{{ $data->location }} | {{ $data->working_hours }}</span>
    </div>
  </div>
  @if (!empty($data->link))
    <div class="card-footer border-0 text-right mb-3 bg-white">
      <a href="{{ $data->link }}" class="btn btn-outline-primary">View listing</a>
    </div>
  @endif
</div>