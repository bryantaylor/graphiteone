@php
$quote_block = get_field('quote_block');
$title = $quote_block['title'];
$quote = $quote_block['quote'];
$button = $quote_block['button'];
$author = $quote_block['author'];
$org = $quote_block['org'];
$background_url = $quote_block['background'];
@endphp

<div class="quote-block">
    <div class="title title-border-top">
        @if ($title)
            <div class="light h4">{{ $title }}</div>
        @endif
    </div>
    <div class="content" style="background-image: url('{{ $background_url }}')">
        @if ($quote)
            <div class="quote light font-italic">{!! $quote !!}</div>
        @endif
        @if ($button['title'] && $button['url'])
            <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $button['title'] }}</a>
        @endif
        <div class="info light">
            @if ($author)
                <div class="author">{{ $author }}</div>
            @endif
            @if ($org)
                <div class="org font-italic">{{ $org }}</div>
            @endif
        </div>
    </div>
</div>
