<span class="navbar-text mr-1 d-none d-sm-inline-block"><i class="fa fa-flag"></i></span>
<div class="my-2 my-lg-0 btn-group">
  @foreach( $site->languages('routes') as $lang => $url )
  <a href="{{ $url }}" class="btn btn-outline-{{ $site->languages('active') === $lang ? 'secondary' : 'primary' }} my-2 my-sm-0">{{ strtoupper($lang) }}</a>
  @endforeach
</div>
