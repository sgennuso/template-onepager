<div class="video-section{{ isset($class) ? " $class" : '' }}" style="background-image:url({{ $poster }})">
	<div class="video-section__caption">
		{{ $slot }}
	</div>
	<video playsinline autoplay muted loop poster="{{ $poster }}">
		<source src="{{ $video }}" type="video/mp4">
	</video>
</div>
