@extends('layouts.onepager')

@section('content')

  @component('components.hero', ['image' => $site->asset('images/hero.800x800.2x.jpg'), 'class' => 'hero--fixed' ])
    <div class="container">
      <h1>{{ $site->global()->business->tagline }}</h1>
      <h2>{{ $site->global('site_description') }}</h2>
    </div>
  @endcomponent

  @component('components.cta-bar')
	<a href="#" class="cta-bar__tilt">
		<span>
			<span class="icon-circle mr-2"><i class="fa fa-money"></i></span> Free Estimates
		</span>
	</a>
	<a href="#" class="cta-bar__tilt">
		<span>
			<span class="icon-circle mr-2"><i class="fa fa-phone"></i></span> {{ $site->global()->business->phone }}
		</span>
	</a>
	<a href="#" class="cta-bar__tilt">
		<span>
			<span class="icon-circle mr-2"><i class="fa fa-certificate"></i></span> 7 Year Guarantee
		</span>
	</a>
	@endcomponent

  <section id="services" class="section section--light py-5">
    <div class="container">
      <h1 class="section__title">Services</h1>
      <ul class="grid grid--md-3 services">
        <li class="service">
          <i class="fa fa-certificate"></i>
          <h3>Service 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
        </li>
        <li class="service">
          <i class="fa fa-certificate"></i>
          <h3>Service 2</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
        </li>
        <li class="service">
          <i class="fa fa-certificate"></i>
          <h3>Service 3</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
        </li>
      </ul>
    </div>
  </section>

  <section id="about" class="section text-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-8">
          <h1 class="section__title">About</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="py-5" id="testimonials">
		<div class="container">
			@component("components.slider", ['site' => $site,
				'id' => 'testimonials',
				'data' => 	['interval' => 2000],
			])
			<div class="carousel-item active">
				<blockquote class="row justify-content-between">
          <div class="col-sm-2">
            <img class="img-fluid rounded-circle" src="http://i.pravatar.cc/400">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
            <p class="text-right"><small>John Smith</small></p>
          </div>
				</blockquote>
			</div>
			<div class="carousel-item">
        <blockquote class="row justify-content-between">
          <div class="col-sm-2">
            <img class="img-fluid rounded-circle" src="http://i.pravatar.cc/400">
          </div>
          <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
            <p class="text-right"><small>John Smith</small></p>
          </div>
				</blockquote>
			</div>
      <ol class="carousel-indicators">
        <li data-target="#testimonials" data-slide-to="0" class="active"></li>
        <li data-target="#testimonials" data-slide-to="1"></li>
      </ol>
			@endcomponent
		</div>
	</div>

  <div id="contact" class="section section--light py-5">
      <div class="container">
          <h1 class="section__title">{{ $site->trans('Contact') }}</h1>
          <div class="row">
              <div class="col-md-6">
                  @if( isset($site->global()->business->address) )
                  <p class="h6"><i class="fa fa-home"></i> {!! str_replace('|', '&nbsp;', stripslashes($site->global()->business->address)) !!}</p>
                  <hr/>
                  @endif

                  @if( isset($site->global()->business->email) )
                  <p class="h6"><a href="mailto:{{ $site->global()->business->email }}"><i class="fa fa-envelope"></i> {{ $site->global()->business->email }}</a></p>
                  <hr/>
                  @endif

                  @if( isset($site->global()->business->hours) )
                  <h6><i class="fa fa-calendar"></i> Hours</h4>
                  <dl class="row">
                    @foreach( $site->global()->business->hours as $day => $time )
                    <dt class="col-6">{{ $day }}</dt>
                    <dd class="col-6">{{ $time }}</dd>
                    @endforeach
                  </dl>
                  @endif

              </div>
              <div class="col-md-6">
                  @include("partials.contact-form")
              </div>
          </div>
      </div>
  </div>

  @if( isset($site->global()->business->latitude) && isset($site->global()->business->longitude) )
  <div class="section-map">
    @include("partials.map")
  </div>
  @endif


@endsection
