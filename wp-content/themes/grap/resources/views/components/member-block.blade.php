@php
$member_block = get_field('member_block');
@endphp

<div class="member-block">
    <div class="container">
        @foreach ($member_block as $block)
            @php
                $block_title = $block['title'];
                $block_members = $block['member_list'];
            @endphp
            <div class="block-wrap">
                <div class="title title-border-top">
                    @if ($block_title)
                        <div class="light">{!! $block_title !!}</div>
                    @endif
                </div>
                <div class="members-wrap">
                    @if ($block_members)
                        @foreach ($block_members as $member)
                            @php
                                $member_img = get_the_post_thumbnail_url($member->ID);
                                $position = get_field('member_position', $member->ID);
                                $secondary_title = get_field('secondary_title', $member->ID);
                                $member_link = get_permalink($member->ID);
                            @endphp
                            <a href="{{ $member_link }}" class="member {{ !$member_img ? 'light-border-top' : '' }}">
                                @if ($member_img)
                                    <div class="member-image">
                                        <img src="{{ $member_img }}" alt="">
                                        <div class="member-cta">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    </div>
                                @endif
                                <div class="member-info light d-flex justify-content-between align-items-center">
                                    <div class="info-group">
                                        <p class="name h5">{{ $member->post_title }}</p>
                                        @if ($position)
                                            <p class="position h5">{{ $position }}</p>
                                        @endif
                                        @if ($secondary_title)
                                            <p class="secondary-title h5">{{ $secondary_title }}</p>
                                        @endif
                                    </div>
                                    @if (!$member_img)
                                        <div class="member-cta">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
