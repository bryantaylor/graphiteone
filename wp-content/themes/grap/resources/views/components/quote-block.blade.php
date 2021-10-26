@php
$quote_block = get_field('quote_block');
@endphp

<div class="quote-block">
    <div class="quotes">
        @if ($quote_block)
            @foreach ($quote_block as $item)
                @php
                    $title = $item['title'];
                    $quote = $item['quote'];
                    $button = $item['button'];
                    $author = $item['author'];
                    $org = $item['org'];
                    $background_url = $item['background'];
                @endphp
                <div class="slider-wrap">
                    <div class="quote-wrap">
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
                </div>
            @endforeach
        @endif
    </div>
    <div class="slider-nav d-none d-lg-block">
        <img src="@asset('images/prev-icon.png')" class="nav-icon prev">
        <img src="@asset('images/next-icon.png')" class="nav-icon next">
    </div>
</div>
