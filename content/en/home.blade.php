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

  @if( $services = $site->global('services') )
  <section id="services" class="section section--light py-5" data-in-view="header">
    <div class="container">
      <h1 class="section__title my-2"><span>{{ $site->trans('Services') }}</span></h1>
      <ul class="grid grid--md-3 services">
        @foreach( $services as $service )
        <li class="service p-2">
          <span class="icon-circle icon-circle--dark"><i class="fa fa-{{ $service['icon'] }}"></i></span>
          <h3 class="mt-2">{{ $service['name'] }}</h3>
          <p>{{ $service['description'] }}</p>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  @endif

  <section id="about" class="section text-center py-5" data-in-view="header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-8">
          <h1 class="section__title"><span>{{ $site->trans('About') }}</span></h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </section>

  @if( $testimonials = $site->global('testimonials') )
  <div class="py-5" id="testimonials" data-in-view="header">
		<div class="container">
			@component("components.slider", ['site' => $site,
				'id' => 'testimonials',
				'data' => 	['interval' => 2000],
			])
      @foreach($testimonials as $testimonial)
			<div class="carousel-item {{ $loop->first ? ' active' : null }}">
				<blockquote class="row justify-content-between">
          <div class="col-sm-2">
            <img class="img-fluid rounded-circle" src="{{ isset($testimonial['image']) ? $site->asset($testimonial['image']) : $site->asset( 'images/testimonials/' . str_replace(' ', '-', strtolower($testimonial['name'])) . '.jpg' ) }}">
          </div>
          <div class="col-sm-9">
            <p>{{ $testimonial['quote'] }}</p>
            <p class="text-right"><small>{{ $testimonial['name'] }}</small></p>
          </div>
				</blockquote>
			</div>
      @endforeach
      <ol class="carousel-indicators">
        @foreach($testimonials as $testimonial)
        <li data-target="#testimonials" data-slide-to="0"{!! $loop->first ? ' class="active"' : null !!}></li>
        @endforeach
      </ol>
			@endcomponent
		</div>
	</div>
  @endif

  @if( $feed = $site->display()->socialFeed('facebook', [
    'fields' => 'permalink_url,created_time,full_picture,message,caption',
    'limit' => 10,
    'limit' => 10,
    ]) )
  <aside class="section">
    <h1 class="section__title my-2"><span>{{ $site->trans('Facebook') }}</span></h1>
    <div class="feed">
      @foreach( $feed as $item )
        @if( isset($item['full_picture']) )
        <a class="feed__item" href="{{ $item['permalink_url'] }}" target="_blank">
          <span class="feed__caption">
            @if( isset($item['caption']) )
            <span>{{ $item['caption'] }}</span>
            @endif
            <span class="feed__time">{{ date('F j, Y', strtotime($item['created_time'])) }}</span>
          </span>
          <img src="{{ $item['full_picture'] }}" alt="{{ $item['caption'] ?? null }}"/>
        </a>
        @endif
      @endforeach
    </div>
  </aside>
  @endif

  <div id="contact" class="section section--light py-5" data-in-view="header">
      <div class="container">
          <h1 class="section__title"><span>{{ $site->trans('Contact') }}</span></h1>
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
