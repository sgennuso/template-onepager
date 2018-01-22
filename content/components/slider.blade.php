@php
$autoId = isset($id) ? $id : 'slider' . rand();
@endphp
<div id="{{ $autoId }}" class="carousel slide" data-ride="carousel"{!! isset($data) ? $site->display()->buildAttributes($data, 'data-') : null !!}>
  <div class="carousel-inner">
    @isset( $slides )
      @foreach( $slides as $slide )
      <div class="carousel-item{{ $loop->first ? ' active' : null }}">
        <img class="d-block w-100" src="{{ $slide }}" alt="First slide">
      </div>
      @endforeach
      @if( $controls )
      <a class="carousel-control-prev" href="#{{ $autoId }}" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#{{ $autoId }}" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      @endif
      @if( $indicators )
      <ol class="carousel-indicators">
        @foreach( $slides as $slide )
        <li data-target="#{{ $autoId }}" data-slide-to="0"{{ $loop->first ? ' class="active"' : '' }}></li>
        @endforeach
      </ol>
      @endif
    @else
      {{ $slot }}
    @endif
  </div>
</div>
