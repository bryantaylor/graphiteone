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
                    @endphp
                    <div class="statistics-item">
                        @if ($icon || $label)
                            <div class="icon-wrap d-flex align-items-center">
                                @if ($icon_url)
                                    <img src="{{ $icon_url }}" alt="" class="icon">
                                @endif
                                @if ($label)
                                    <div class="label h5">{{ $label }}</div>
                                @endif
                            </div>
                        @endif

                        <div class="content">
                            @if ($big_number !== '')
                                <div class="big-number primary-orange">{{ $big_number }}</div>
                            @endif
                            @if ($big_text)
                                <div class="big-text h1">{{ $big_text }}</div>
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
