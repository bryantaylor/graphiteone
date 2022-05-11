@php
$latest_news_block = get_field('latest_news_block');
$title = $latest_news_block['title'];
$posts = empty($latest_news_block['posts']) ? App\get_latest_posts('post', 3) : $latest_news_block['posts'];
$button = $latest_news_block['button'];
$background_url = $latest_news_block['background'];
$bg_position = $latest_news_block['bg_position'];
@endphp

@if ($posts)
    <div class="latest-news-block">
        <div class="block-wrap">
            <div class="title title-border-top">
                @if ($title)
                    <h4>{{ $title }}</h4>
                @endif
            </div>
            <div class="news-wrap">
                <div class="news">
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
                </div>
                @if (count($posts) > 1)
                    <div class="slider-nav d-none d-lg-block">
                        <img src="@asset('images/prev-icon.png')" class="nav-icon prev">
                        <img src="@asset('images/next-icon.png')" class="nav-icon next">
                    </div>
                @endif
            </div>
            @if ($button['title'] && $button['url'])
                <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $button['title'] }}</a>
            @endif
        </div>

        <div class="bg-attach {{ $bg_position == 'right' ? 'bg-right' : 'bg-center' }}" style="background-image: url('{{ $background_url }}')">
        </div>
    </div>
@endif
