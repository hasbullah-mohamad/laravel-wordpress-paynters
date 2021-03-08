@if (Request::ajax())

  @yield('content')

@else

  <!DOCTYPE html>
  <html lang="en">
  <head>
    
    {{-- {{ do_action( 'template_redirect' ) }} --}}
    {{ wp_head() }}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! App\Assets::style('app') !!}
    <link rel="shortcut icon" href="{{ asset('/dist/media/favicon.ico') }}" />
  <title>{{ (isset($title) ? $title . ' - ' : '') . 'Paynters'/*config('app.name')*/ }}</title>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PQVJWRK');</script>
    <!-- End Google Tag Manager -->
  </head>
  <body>
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQVJWRK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('shared.header')
    <div class="site-content">
      @yield('content')
    </div>
    @include('shared.footer')
    {!! App\Assets::script('polyfills') !!}
    {!! App\Assets::script('app') !!}
    @stack('scripts')
    
    {{ wp_footer() }}

    @if(config('app.env') == 'dev')
      <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    @endif

    @php
      $previousURL = url(URL::previous());
      if ($previousURL == URL::current()) {
        $previousURL = url('projects');
      }
    @endphp

    <script>
      window.previousURL = "{{ $previousURL }}";
    </script>

  </body>
  </html>

@endif
