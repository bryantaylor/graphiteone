@php
$statistics_block = get_field('statistics_block');
$statistics_list = $statistics_block['statistics_list'];
$background = $statistics_block['background'];
@endphp

<div class="statistics-block {{ $background == 'black' ? 'bg-black' : 'bg-white' }}">
    <div class="container">
        <div class="statistics-wrap">
            @if ($statistics_list)
                @foreach ($statistics_list as $item)
                    @php
                        $icon_url = $item['icon'];
                        $label = $item['label'];
                        $big_number = $item['big_number'];
                        $big_text = $item['big_text'];
                        $achievement = $item['achievement'];
                        $from_org = $item['from_organization'];
                        $external_link = $item['external_link'];
                    @endphp
                    <div class="statistics-item">
                        @if ($icon_url && $label)
                            <div class="icon-wrap d-flex align-items-lg-center">
                                <img src="{{ $icon_url }}" class="icon">
                                @if ($external_link['url'] && $external_link['title'])
                                    <a href="{{ $external_link['url'] }}" target="{{ $external_link['target'] }}" class="label-wrap h5 mb-0">
                                        <div class="label {{ $background == 'black' ? 'light' : 'secondary-dark' }}">{{ $label }}</div>
                                        <div class="link {{ $background == 'black' ? 'light' : 'primary-orange' }}">
                                            <div class="link-title">{{ $external_link['title'] }}</div>
                                            @if ($background == 'black')
                                                <img src="@asset('images/white-arrow-right.png')" alt="white-arrow-right" class="arrow-icon">
                                            @else
                                                <img src="@asset('images/arrow-right.png')" alt="arrow-right" class="arrow-icon">
                                            @endif
                                        </div>
                                    </a>
                                @else
                                    <div class="label h5 mb-0 {{ $background == 'black' ? 'light' : 'secondary-dark' }}">{{ $label }}</div>
                                @endif
                            </div>
                        @endif

                        <div class="content">
                            @if ($big_number !== '')
                                <div class="big-number primary-orange">{{ $big_number }}</div>
                            @endif
                            @if ($big_text)
                                <div class="big-text">{{ $big_text }}</div>
                            @endif
                        </div>

                        <div class="achievement-wrap">
                            @if ($achievement)
                                <div class="achievement h4">{{ $achievement }}</div>
                            @endif
                            @if ($from_org)
                                <div class="from-org">{{ $from_org }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
