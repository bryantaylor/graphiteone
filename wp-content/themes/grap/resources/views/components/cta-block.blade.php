@php
$cta_block = get_field('cta_block');
$label = $cta_block['label'];
$description = $cta_block['description'];
$button = $cta_block['button'];
$background_url = $cta_block['background'];
@endphp

<div class="cta-block d-flex flex-column justify-content-center" style="background-image: url('{{ $background_url }}')">
    <div class="container">
        @if ($label)
            <div class="label light">{{ $label }}</div>
        @endif
        @if ($description)
            <div class="description light">{!! $description !!}</div>
        @endif
        @if ($button)
            <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $button['title'] }}</a>
        @endif
    </div>
</div>
