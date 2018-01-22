@component('components.contact-form', [
  'site' => $site,
  'attachment' => true,
  'captcha' => true,
  'submitText' => 'Send'
])
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-user"></i><label class="my-0 ml-1" for="formName">{{ $site->trans('Name') }}</label>
    </span>
    <input id="formName" type="text" name="_name" value="" class="form-control" required/>
  </div>
</div>
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-envelope"></i><label class="my-0 ml-1" for="formEmail">{{ $site->trans('Email') }}</label>
    </span>
    <input id="formEmail" type="email" name="_email" value="" class="form-control" required/>
  </div>
</div>
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-file"></i><label class="my-0 ml-1" for="formAttachment">{{ $site->trans('Attachment') }}</label>
    </span>
    <input id="formAttachment" type="file" name="attachments[photo]" value="" class="form-control" required/>
  </div>
</div>
<div class="form-group">
  <label class="sr-only" for="formMessage">{{ $site->trans('Message') }}</label>
  <textarea id="formMessage" name="_message" class="form-control" rows="5" placeholder="{{ $site->trans("Your message...") }}" required></textarea>
</div>
@endcomponent
