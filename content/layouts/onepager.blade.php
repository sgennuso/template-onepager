<!DOCTYPE html>
<html lang="{{ $lang }}">
	<head>
		@include("partials.head")
	</head>

	<body id="page">

		<header class="site-header" id="header">
		  @component("components.navbar", ['site' => $site, 'class' => 'navbar-dark'])
		  <div class="container">
		    <a class="navbar-brand" href="{{ $site->url('home') }}" data-scroll-to="page" data-scroll-to-offset="header">
					{{ $site->global('site_title') }}
				</a>

				<div class="navbar-utility order-0 order-md-9">
					@if( isset($site->global()->business->phone) )
						<a href="tel:{{ $site->global()->business->phone }}" class="btn btn-primary mr-2 d-none d-sm-inline-block">
							<i class="fa fa-phone"></i> {{ $site->global()->business->phone }}
						</a>
					@endif

					@include('partials.language-switcher')
				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <i class="fa fa-bars"></i>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav">
						@foreach( $site->global('onepagemenu') as $item )
            <li class="nav-item">
              <a href="#{{ $item }}" class="nav-link" data-scroll-to="{{ $item }}" data-scroll-to-offset="header">
								{{ ucfirst($site->trans($item)) }}
              </a>
            </li>
						@endforeach
          </ul>

		    </div><!-- #navbarSupportedContent.collapse.navbar-collapse -->
		  </div><!-- .container -->
		  @endcomponent
		</header>

		<div id="content" class="site-content">
			@yield('content')
		</div>

		@include("partials.footer")

		<script src="{{ $site->vendor('npm-asset/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ $site->vendor('npm-asset/popper.js/dist/umd/popper.min.js') }}"></script>
		<script src="{{ $site->vendor('npm-asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ $site->vendor('npm-asset/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
		<script src="{{ $site->vendor('npm-asset/waypoints/lib/jquery.waypoints.min.js') }}"></script>
		<script src="{{ $site->vendor('npm-asset/waypoints/lib/shortcuts/sticky.min.js') }}"></script>
		<script>
		var sticky = new Waypoint.Sticky({
		  element: $('#header')
		});
		</script>
		<script src="{{ $site->asset('scripts/template.js', true) }}"></script>
		@yield('foot')

		@stack('scripts')
	</body>
</html>
