@php
$logo = get_field('logo', 'option');
$mobile_logo = get_field('mobile_logo', 'option');
@endphp

<div class="primary-nav">
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
                <p class="label light">menu</p>
                <img src="@asset('images/menu-icon.png')" alt="menu-icon" class="icon">
            </div>
        </div>
    </div>
</div>
