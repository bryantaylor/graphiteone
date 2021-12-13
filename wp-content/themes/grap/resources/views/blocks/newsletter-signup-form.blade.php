{{--
  Title: Newsletter Signup Form
  Category: reusable
  Icon: admin-generic
  Keywords: newsletter signup form
  Mode: edit
--}}

@php
$portal_id = get_field('portal_id');
$form_guid = get_field('form_guid');
@endphp

<div class="newsletter-signup-form">
  <div class="container">
    <form>
      <div class="form-section align-items-start">
        <h3 class="form-label">Sign up for the latest news and updates.</h3>
        <div class="input-section">
          <div class="w-100">
            <input class="email-input" type="email" name="email" placeholder="Your Email" required />
            <p class="result-message text-center"></p>
          </div>
          <input type="hidden" name="portalId" value="{{$portal_id}}" />
          <input type="hidden" name="formGuid" value="{{$form_guid}}" />
          <input class="primary-button" type="submit" value="Signup" />
        </div>
      </div>
    </form>
  </div>
</div>
