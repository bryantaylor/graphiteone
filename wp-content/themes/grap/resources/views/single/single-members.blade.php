@php
$id = get_the_ID();
$thumbnail = get_the_post_thumbnail_url($id);
@endphp

<div class="single-member light">
    <div class="container">
        <div class="block-wrap">
            <div class="title">
                @if ($thumbnail)
                    <img src="{{ $thumbnail }}" alt="member-image">
                @endif
                <div class="social-share">
                    <div class="h5">Share</div>
                    <div class="short-code">
                        {!! do_shortcode('[Sassy_Social_Share]') !!}
                    </div>
                </div>
            </div>
            <div class="content">
                {!! the_content() !!}
            </div>
        </div>
    </div>
</div>
