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
            </div>
            <div class="content">
                {!! the_content() !!}
            </div>
        </div>
    </div>
</div>
