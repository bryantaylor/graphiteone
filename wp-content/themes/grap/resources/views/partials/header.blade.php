@php
$hero_header = get_field('hero_header');
$title = $hero_header['title'];
$background = $hero_header['background'];
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
@else
    <header>
        @include('components.primary-nav')
        <div class="title container light">
            <div class="page-title h4">News & Resources</div>
            <div class="single-post-title h2">{!! $single_post_title !!}</div>
        </div>
    </header>
@endif
