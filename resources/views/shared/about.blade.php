<div class="section-about text-center text-lg-left mt-10">
  <div class="container container-plus py-6 py-md-8 ">
    <div class="row">
      <div class="col-md-4 text-md-center mb-md-0 mb-4">
        <div class="logo-lattice">
          <img src="{{ asset('dist/media/paynters-lattice.svg')}}" />
        </div>
      </div>
      <div class="col-md-7">
        <div class="logo">
          <img src="{{ asset('dist/media/paynters.svg')}}" />
        </div>

        @if($home)
          <div class="mt-4">
            {!! $home->content() !!}
          </div>
        @endif
        
      </div>
    </div>
  </div>
  <div class="container container-plus d-block d-md-none">
    <hr class="bg-separator" />
  </div>
</div>