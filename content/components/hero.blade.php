<div class="hero{{ isset($class) ? " $class" : '' }}" style="background-image:url({{ $image }})">
	<div class="hero__caption">		
		{{ $slot }}
	</div>
</div>
