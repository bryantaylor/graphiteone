@php
$page_id = get_the_ID();
$primary_menu = App\get_primary_menu_items('primary-menu');
$logo = get_field('logo', 'option');
$mobile_logo = get_field('mobile_logo', 'option');
$menu_cta = get_field('menu_cta', 'option');
@endphp

<div class="menu">
    <div class="container">
        <div class="nav-wrap d-flex justify-content-between align-items-center">
            <a href="/">
                @if ($logo)
                    <img src="{{ $logo }}" alt="logo" class="logo d-none d-lg-block">
                @endif
                @if ($mobile_logo)
                    <img src="{{ $mobile_logo }}" alt="mobile_logo" class="mobile-logo d-block d-lg-none">
                @endif
            </a>
            <div class="menu-icon d-flex align-items-center">
                <p class="label light">close</p>
                <img src="@asset('images/close-icon.png')" alt="menu-icon" class="icon">
            </div>
        </div>

        <div class="menu-group d-flex flex-column">
            @if ($primary_menu)
                @foreach ($primary_menu as $item)
                    @php
                    $has_child_items = $item->child_items ? true : false;
                    @endphp
                    <a href="{{ $item->url }}"
                       class="menu-item h3 light @if($has_child_items){{ 'has-children' }}@endif"
                    >{!! $item->title !!}</a>
                    @if($has_child_items)
                    @foreach($item->child_items as $subitem)
                    <a href="{{ $subitem->url }}" class="menu-item menu-item--subitem p light">{{  $subitem->title }}</a>
                    @endforeach
                    @endif
                @endforeach
            @endif
        </div>

        <div class="cta-group d-flex flex-column flex-md-row">
            @if ($menu_cta)
                @foreach ($menu_cta as $item)
                    @php
                        $cta_item = $item['cta_item'];
                    @endphp
                    @if ($cta_item['title'] && $cta_item['url'])
                    @if($loop->first)
                        <a href="{{ $cta_item['url'] }}"
                           target="{{ $cta_item['target'] }}"
                           class="cta-item primary-button"
                        >{{ $cta_item['title'] }}</a>
                    @else
                        <a href="{{ $cta_item['url'] }}"
                          target="{{ $cta_item['target'] }}"
                          class="cta-item secondary-button"
                        >{{ $cta_item['title'] }}</a>
                    @endif
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
