@php
$latest_news_block = get_field('latest_news_block');
$post_type = $latest_news_block['post_type'];
$number_of_posts = $latest_news_block['number_of_posts'];
$button = $latest_news_block['button'];
$background_url = $latest_news_block['background'];
$bg_position = $latest_news_block['bg_position'];
$posts = App\get_latest_posts($post_type, $number_of_posts);
@endphp

<div class="latest-news-block">
    <div class="block-wrap">
        <div class="title title-border-top">
            @if ($post_type == 'graphite-news')
                <h4>Latest News</h4>
            @else
                <h4>Latest Community News</h4>
            @endif
            @if ($button['title'] && $button['url'])
                <a href="{{ $button['url'] }}" target="{{ $button['target'] }}"
                    class="primary-button d-inline-block d-sm-none">{{ $button['title'] }}</a>
            @endif
        </div>
        <div class="news-wrap">
            <div class="news">
                @if ($posts)
                    @foreach ($posts as $post)
                        @php
                            $post_date = date('F j, Y', strtotime($post->post_date));
                        @endphp
                        <a href="{{ get_permalink($post->ID) }}" class="post">
                            <div class="post-date dark">
                                {{ $post_date }}
                            </div>
                            <div class="post-title h3">
                                {{ $post->post_title }}
                            </div>
                            <div class="post-button d-flex align-items-center primary-orange">
                                Read News
                                <img src="@asset('images/arrow-right.png')" alt="arrow-right" class="arrow-icon">
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="slider-nav d-none d-lg-block">
                <img src="@asset('images/prev-icon.png')" class="nav-icon prev">
                <img src="@asset('images/next-icon.png')" class="nav-icon next">
            </div>
        </div>
        @if ($button['title'] && $button['url'])
            <a href="{{ $button['url'] }}" target="{{ $button['target'] }}"
                class="primary-button d-none d-sm-inline-block">{{ $button['title'] }}</a>
        @endif
    </div>

    <div class="bg-attach {{ $bg_position == 'right' ? 'bg-right' : 'bg-center' }}" style="background-image: url('{{ $background_url }}')">
    </div>
</div>
