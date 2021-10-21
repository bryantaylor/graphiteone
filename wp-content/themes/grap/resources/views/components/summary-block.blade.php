@php
$summary_block = get_field('summary_block');
$title = $summary_block['title'];
$content = $summary_block['content'];
$left_bg_url = $summary_block['left_bg'];
@endphp

<div class="summary-block">
    <div class="container">
        <div class="block-wrap">
            <div class="title title-border-top">
                @if ($title)
                    <div class="primary-orange h4">{{ $title }}</div>
                @endif
            </div>
            @if ($content)
                <div class="content">{!! $content !!}</div>
            @endif
        </div>
    </div>

    @if ($left_bg_url)
        <img src="{{ $left_bg_url }}" alt="left-attachment" class="bg-attach-left">
    @endif
</div>
