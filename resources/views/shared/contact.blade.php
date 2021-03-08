<div class="section section-top pb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pr-lg-8 mb-6">
        <div class="card clip-card shadow">
          <div class="card-body p-md-8 pt-6 pt-md-8">
            @if($form_id = get_field('ninja_form_id'))
                {!! do_shortcode(sprintf('[ninja_form id=%s]', $form_id)) !!}
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-6">
        <div class="clip-card mb-4 shadow embed-responsive embed-responsive-21by9">
          <iframe class="embed-responsive-item w-100" id="contact-map"
            src="https://maps.google.com/maps?q=7+Baroona+Road,+Milton+QLD+4064&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
        <div class="row">
          @foreach(get_field('offices') as $office)
              <div class="col-sm-6">
                <h6 class="text-info">{{ $office['title'] }}</h6>
                <div class="mb-4">
                  @if($office['address'])
                    <div class="d-flex align-items-center">
                      <div class="pr-2">@include ('shared.svgs.icon-location', ['class' => 'svg-icon svg-icon-dark'])</div>
                      <div><span>{{ $office['address'] }}</span></div>
                    </div>
                  @endif
                  @if($office['po_box'])
                    <div class="d-flex align-items-center">
                      <div class="pr-2"><i class="icon icon-email icon-sm"></i></div>
                      <div class="pr-2"><span>{{ $office['po_box'] }}</span></div>
                    </div>
                  @endif
                  @if($office['phone'])
                    <div class="d-flex align-items-center">
                      <div class="pr-2"><i class="icon icon-phone-call icon-sm"></i>
                      </div>
                      <div class="pr-2"><span>{{ $office['phone'] }}</span></div>
                    </div>
                  @endif
                  @if($office['email'])
                    <div class="d-flex align-items-center">
                      <div class="pr-2"><i class="icon icon-email icon-sm"></i></div>
                      <div class="pr-2"><span><a href="mailto:{{ $office['email'] }}">{{ $office['email'] }}</a></span></div>
                    </div>
                  @endif
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
