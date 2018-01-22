@php
	$classes = ['section'];
	isset($class) ? $classes = array_merge($classes, explode(' ', $class)) : null;
	isset($light) && $light == true ? $classes[] = 'section--light' : null;
@endphp
<div class="{{ implode(' ', $classes) }}">
	{{ $slot }}
</div>
