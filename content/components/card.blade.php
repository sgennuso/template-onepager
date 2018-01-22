<div class="card" style="width: 20rem;">
  @if( $image )
  <img class="card-img-top" src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
  @endif
  <div class="card-body">
    @if( $title )
    <h4 class="card-title">{{ $title }}</h4>
    @endif
    {{ $slot }}
  </div>
</div>
