@php
$infobox_block = get_field('infobox_block');
@endphp

<div class="infobox-block">
    @if ($infobox_block)
        @foreach ($infobox_block as $box)
            @php
                $title = $box['title'];
                $content = $box['content'];
                $background_url = $box['background'];
            @endphp
            <div class="box light" style="background-image: url({{ $background_url }})">
                @if ($title)
                    <div class="title title-border-top h5">{{ $title }}</div>
                @endif
                @if ($content)
                    <div class="content ex">{!! $content !!}</div>
                @endif
            </div>
        @endforeach
    @endif
</div>
