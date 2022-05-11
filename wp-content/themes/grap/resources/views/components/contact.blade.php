@php
  $contact_block = get_field('contact_block');
  $title = $contact_block['title'];
  $form_id = $contact_block['form'];
@endphp

<div class="vertical-feature-block">
  <div class="container">
      <div class="block-wrap">
          <div class="title title-border-top">
              @if ($title)
                  <div class="light h4">{{ $title }}</div>
              @endif
          </div>
          <div class="content-wrap">
            <div class="contact-form">{!!do_shortcode('[contact-form-7 id=' . $form_id . ' title="Contact form"]')!!}</div>
          </div>
      </div>
  </div>
</div>
