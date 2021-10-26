@php
$category = get_the_category();
$first_category = $category[0]->cat_name;
$download_button = get_field('download_button');
$button_name = $download_button['title'];
$button_file = $download_button['file'];
@endphp

<div class="single-post-content light">
    <div class="container">
        <div class="block-wrap">
            <div class="title title-border-top">
                <div class="title-wrap d-flex align-items-center justify-content-between">
                    @if ($first_category)
                        <div class="category d-flex align-items-center">
                            <span class="dot"></span>
                            <div class="category-name h4">{{ $first_category }}</div>
                        </div>
                    @endif
                    <div class="post-date h5">{{ get_the_date('F j, Y') }}</div>
                </div>
                <div class="social-share">
                    <div class="h5">Share</div>
                    <div class="short-code">
                        {!! do_shortcode('[Sassy_Social_Share]') !!}
                    </div>
                </div>
                @if ($button_name && $button_file)
                    <a href="{{ $button_file['url'] }}" download="{{ $button_file['filename'] }}" class="primary-button">{{ $button_name }}</a>
                @endif
            </div>
            <div class="content">
                {!! the_content() !!}
            </div>
        </div>
    </div>
</div>
