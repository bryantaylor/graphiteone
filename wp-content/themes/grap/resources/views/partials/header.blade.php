@php
$hero_header = get_field('hero_header');
$title = $hero_header['title'];
$background = $hero_header['background'];
$subnav = $hero_header['sub_navigation'];
$page_title = get_the_title();
$id = get_the_ID();
$single_post_title = get_the_title($id);
@endphp

@include('components.menu')
@if (!is_single())
    <header style="background-image: url('{{ $background['url'] }}')" class="{{ !is_front_page() ? 'bg-attach-top-right' : '' }}">
        @include('components.primary-nav')
        <div class="title container light">
            @if (!is_front_page())
                <div class="page-title h4">{!! $page_title !!}</div>
            @endif
            {!! $title !!}
        </div>
    </header>
    @if ($subnav)
    @include('components.subnav')
    @endif
@else
    <header>
        @include('components.primary-nav')
        <div class="title container light">
            @if (!is_singular('members'))
                <div class="page-title h4">News & Resources</div>
            @endif
            @php
                $position = get_field('member_position', $id);
                $secondary_title = get_field('secondary_title', $id);
            @endphp
            <div class="single-post-title h2">{!! $single_post_title !!}</div>
            @if ($position)
            <h5 class="h5">{{ $position }}</h5>
            @endif
            @if ($secondary_title)
            <p class="ex">{{ $secondary_title }}</p>
            @endif
        </div>
    </header>
@endif
