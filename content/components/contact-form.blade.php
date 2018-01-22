@section('foot')
	@if( $captcha )
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://contact.ubiweb.ca/js/submit.js"></script>
	@endif
@endsection

<form id="recaptcha" action="https://contact.ubiweb.ca/mail{{ $captcha ? '-captcha' : null }}" method="post"{{ $attachment ? ' enctype="multipart/form-data"' : null }}>
	{{ $slot }}
	<input type="hidden" name="autobody" value="true" />
	<input type="hidden" name="to" value="{{ $site->global('admin_email') }}" />
	<input type="hidden" name="subject" value="{{ $site->trans('Ubiweb Contact from') }} {{ $site->global('site_title') }}" />

	@if( $captcha )
	<button
    type="submit"
    class="g-recaptcha btn btn-primary btn-block"
    data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
    data-callback="ubiRecaptchaFormSubmission">
    {{ $site->trans($submitText ?? 'Submit') }}</button>
  <div data-form-response="success" class="alert alert-success" style="display:none">{{ $site->trans('Your message was sent successfully.') }}</div>
  <div data-form-response="error" class="alert alert-danger" style="display:none">{{ $site->trans('There was an error trying to send the form. Please contact: ') }} <a href="mailto:{{ $site->global('admin_email') }}">{{ $site->global('admin_email') }}</a></div>
	@else
	<input type="hidden" name="redirect" value="{{ $site->url()->current() }}" />
	<button type="submit" class="btn btn-primary btn-block">{!! $site->trans($submitText ?? 'Submit') !!}</button>
	@endif
</form>
