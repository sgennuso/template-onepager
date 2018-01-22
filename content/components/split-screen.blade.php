<div class="split-screen">
  @if( isset($reverse) && $reverse == true )
    <div class="split-screen__content">
      {{ $slot }}
    </div>
    <div class="split-screen__image" style="background-image:url({{ $image }});">
      <div class="split-screen__image__caption">{{ $caption ?? '' }}</div>
    </div>
  @else
    <div class="split-screen__image" style="background-image:url({{ $image }});">
      <div class="split-screen__image__caption">{{ $caption ?? '' }}</div>
    </div>
    <div class="split-screen__content">
      {{ $slot }}
    </div>
  @endif
</div>
