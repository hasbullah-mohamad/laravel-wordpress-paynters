<div class="card card-member" data-toggle="modal" data-target="#modal-member">
  <img class="card-image" src="{{ $data->featured_image }}"/>
  <div class="overlay w-100">
    <div class="card-content px-5">
      <h6 class="card-title mb-1">{{ $data->name }}</h6>
      <div class="card-text">{{ $data->position }}</div>
      <script type="text/html">
        <div class="member-image" style="background-image: url({{ $data->featured_image }});" />
        <div class="px-lg-5 pt-lg-5 pb-lg-4 px-4 pt-4 pb-3">
          <h4 class="text-info">{{ $data->name }}</h4>
          <h6 class="text-info font-weight-normal">{{ $data->position }}</h6>
          <div>{!! $data->content !!}</div>
        </div>
      </script>
    </div>
    <div class="card-footer w-100 text-right border-0">
      <span class="mb-3 text-primary">
        <span>See More</span>
        <i class="icon icon-plus d-inline-block align-middle"></i>
      <span>
    </div>
  </div>
</div>