<div class="row">
  <hr class="mb-5 w-100">
  <div class="col-lg-7 col-md-10">
    <h3 class="text-info mt-3 mb-4">{{ $data->title }}</h3>
    @if (isset($data->awards) && $data->awards)
      <p class="font-size-base text-uppercase">{{ $data->awards }}</p>
    @endif
    @if (isset($data->company) && $data->company)
      <h6 class="text-primary">{{ $data->company }}</h6>
    @endif
  </div>
  <div class="col-lg-7 col-md-8 font-size-base">
    {!! $data->content !!}
  </div>
  <div class="col-lg-5 col-md-6">
    <div class="border-triangle text-light">
      <img class="w-100" src="{{ $data->featured_image }}"/>
    </div>
  </div>
</div>
