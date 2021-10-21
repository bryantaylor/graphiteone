@php
$vertical_feature_block = get_field('vertical_feature_block');
$title = $vertical_feature_block['title'];
$content = $vertical_feature_block['content'];
$button = $vertical_feature_block['button'];
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
                @if ($content)
                    <div class="content light">{!! $content !!}</div>
                @endif
                @if ($button['title'] && $button['url'])
                    <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $button['title'] }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
