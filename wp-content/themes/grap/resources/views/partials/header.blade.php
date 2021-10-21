@php
$hero_header = get_field('hero_header');
$title = $hero_header['title'];
$background = $hero_header['background'];
$page_title = get_the_title();
$id = get_the_ID();
$single_post_title = get_the_title($id);
$thumbnail = get_the_post_thumbnail_url($id);
@endphp

@include('components.menu')
<header style="background-image: url('{{ is_singular('graphite-news') || is_singular('community-news') ? $thumbnail : $background['url'] }}')"
    class="{{ !is_front_page() ? 'bg-attach-top-right' : '' }}">
    @include('components.primary-nav')
    <div class="title container light">
        @if (is_singular('graphite-news') || is_singular('community-news'))
            <div class="single-post-title h2">{!! $page_title !!}</div>
        @else
            @if (!is_front_page())
                <div class="page-title h4">{!! $page_title !!}</div>
            @endif
            {!! $title !!}
        @endif
    </div>
</header>
