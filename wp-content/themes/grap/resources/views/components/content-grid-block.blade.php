@php
$content_grid_block = get_field('content_grid_block');
$intro = $content_grid_block['intro'];
$intro_title = $intro['title'];
$intro_description = $intro['description'];
$intro_button = $intro['button'];
$table_of_contents = $content_grid_block['table_of_contents'];
@endphp

<div class="content-grid-block">
    <div class="container">
        <div class="intro">
            <div class="intro-title title-border-top">
                @if ($intro_title)
                    <div class="primary-orange h4">{{ $intro_title }}</div>
                @endif
            </div>
            <div class="intro-description">
                @if ($intro_description)
                    <div class="content">{!! $intro_description !!}</div>
                @endif
                @if ($intro_button['title'] && $intro_button['url'])
                    <a href="{{ $intro_button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $intro_button['title'] }}</a>
                @endif
            </div>
        </div>

        <div class="step">
            @foreach ($table_of_contents as $index => $item)
                @php
                    $icon_url = $item['icon'];
                    $label = $item['label'];
                    $content = $item['content'];
                @endphp
                <div class="step-item" data-index="{{ $index }}">
                    <div class="icon-wrap d-flex align-items-center">
                        @if ($icon_url)
                            <img src="{{ $icon_url }}" alt="step-icon" class="icon">
                        @endif
                        @if ($label)
                            <div class="label h5">{{ $label }}</div>
                        @endif
                    </div>
                    <div class="description d-flex">
                        <div class="ordinal-number light d-flex justify-content-center align-items-center">{{ $index + 1 }}</div>
                        @if ($content)
                            <div class="content">{!! $content !!}</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
