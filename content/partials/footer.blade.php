<footer class="site-footer py-5">
    <div class="container text-center">
        @if( $site->global()->social )
        <ul class="site-footer__social mb-5">
            @foreach( $site->global()->social as $social => $url )
            <li class="mx-3">
                <a href="{{ $url }}">
                    <span class="icon-circle"><i class="fa fa-{{ $social }}"></i></span>
                    <span class="sr-only">{{ ucfirst($social) }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        <p>Copyright &copy; {{ $site->global('site_title') }}</p>
    </div>
</footer>
