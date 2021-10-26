@php
$logo = get_field('logo', 'option');
$mobile_logo = get_field('mobile_logo', 'option');
$footer_cta = get_field('footer_cta', 'option');
@endphp

<footer>
    <div class="container">
        <div class="footer-wrap d-flex justify-content-between align-items-lg-center">
            <a href="/">
                @if ($logo)
                    <img src="{{ $logo }}" alt="logo" class="logo d-none d-lg-block">
                @endif
                @if ($mobile_logo)
                    <img src="{{ $mobile_logo }}" alt="mobile_logo" class="mobile-logo d-block d-lg-none">
                @endif
            </a>
            <div class="footer-cta">
                @if ($footer_cta)
                    @foreach ($footer_cta as $item)
                        @php
                            $cta_item = $item['cta_item'];
                        @endphp
                        @if ($cta_item['title'] && $cta_item['url'])
                            <a href="{{ $cta_item['url'] }}" target="{{ $cta_item['target'] }}" class="cta-item">{{ $cta_item['title'] }}</a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>
