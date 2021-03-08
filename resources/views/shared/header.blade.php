@php
  $path = Request::path();
@endphp
<div class="site-header site-header-{{ $template_style ?? 'main' }}">
  <div class="container">
    <div class="site-navigation navigation-{{  $template_style ?? 'main' }}">
      <a href="{{ url('/') }}" class="navigation-brand">
        <img src="{{ asset('/dist/media/logo.svg') }}" class="d-lg-block d-none">
        <img src="{{ asset('/dist/media/logo-white.svg') }}" class="d-block d-lg-none">
      </a>
      <button class="navigation-button">
        <span></span><span></span><span></span>
      </button>
      <div class="navigation-bar">
        {{ wp_nav_menu([
            'theme_location' => 'header',
            'menu_class' => 'list-navigation',
        ]) }}
        <ul class="d-lg-none list-social">
          <li><a href="https://www.facebook.com/PaynterDixonQueensland/?rf=165598306785192"><i class="icon icon-facebook"></i></a></li>
          <li><a href="https://www.linkedin.com/company/paynter-dixon-queensland?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A7933631%2Cidx%3A2-1-2%2CtarId%3A1464325479321%2Ctas%3Apaynter%20dixon%20que"><i class="icon icon-twitter"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UC_Yg2jF9Y3aBZySaqMxY8VA"><i class="icon icon icon-youtube"></i></a></li>
        </ul>
        <div class="border-top d-lg-none"></div>
        <ul class="d-lg-none list-footer">
          <li><a href="{{ url('/privacy') }}">Privacy</a></li>
          <li><a href="{{ url('/terms') }}">Terms</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>