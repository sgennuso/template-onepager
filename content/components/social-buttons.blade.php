<ul class="social-buttons">
  @foreach( $properties as $property )
    @if( $property == "twitter" && isset($site->global()->social->{$property}) )
      @php
        $url = $site->global()->social->{$property};
        $twitter = parse_url($url);
        $handle = trim($twitter['path'], '/');
      @endphp
    <li>
      <a href="{{ $url }}?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow {{ '@' . $handle }}</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </li>
    @endif
    @if( $property == "facebook" && isset($site->global()->social->{$property}) )
    <li>
      <div class="fb-follow" data-href="{{ $site->global()->social->{$property} }}" data-layout="button_count" data-size="small" data-show-faces="false"></div>
    </li>
    @endif
  @endforeach
</ul>
