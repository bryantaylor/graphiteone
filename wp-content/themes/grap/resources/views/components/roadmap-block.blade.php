@php
$roadmap_block = get_field('roadmap_block');
$intro = $roadmap_block['intro'];
$intro_title = $intro['title'];
$intro_content = $intro['content'];
$phase_list = $roadmap_block['phase'];
$background_url = $roadmap_block['background'];
@endphp

<div class="roadmap-block" style="background-image: url({{ $background_url }})">
    <div class="container light">
        <div class="intro">
            <div class="intro-title title-border-top">
                @if ($intro_title)
                    <div class="h4">{{ $intro_title }}</div>
                @endif
            </div>
            <div class="intro-content">
                @if ($intro_content)
                    <div class="content">{!! $intro_content !!}</div>
                @endif
            </div>
        </div>

        @if ($phase_list)
            <div class="phase-group">
                @foreach ($phase_list as $index => $phase)
                    @php
                        $phase_title = $phase['title'];
                        $des_list = $phase['description_list'];
                    @endphp
                    <div class="phase">
                        <div class="title title-border-top d-flex align-items-center">
                            <div class="ordinal-number light d-flex justify-content-center align-items-center">{{ $index + 1 }}</div>
                            @if ($phase_title)
                                <div class="h5">{{ $phase_title }}</div>
                            @endif
                        </div>
                        @if ($des_list)
                            <ul class="description-list">
                                @foreach ($des_list as $item)
                                    @if ($item['description_item'])
                                        <li class="description-item">{{ $item['description_item'] }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
