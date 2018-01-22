<header class="site-header">
  @component("components.navbar", ['site' => $site, 'class' => 'navbar-light bg-light'])
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ $site->url('home') }}">{{ $site->global('site_title') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      {!! $site->display()->menu(
        'main',
        ['class' => 'navbar-nav mr-auto'],
        ['class' => 'dropdown-menu']
      ) !!}


      @if( isset($site->global()->business->phone) )
      <a href="tel:{{ $site->global()->business->phone }}" class="nav-link">
          {{ $site->global()->business->phone }}
      </a>
      @endif

      @include('partials.language-switcher')

    </div><!-- #navbarSupportedContent.collapse.navbar-collapse -->
  </div><!-- .container -->
  @endcomponent
</header>
