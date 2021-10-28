@php
$event_list_block = get_field('event_list_block');
$title = $event_list_block['title'];
$event_list = $event_list_block['event_list'];
@endphp

<div class="event-list-block">
    <div class="container">
        <div class="block-wrap">
            <div class="title title-border-top">
                @if ($title)
                    <div class="light h4">{{ $title }}</div>
                @endif
            </div>
            <div class="event-list">
                @if ($event_list)
                    @foreach ($event_list as $event)
                        @php
                            $event_link = $event['link'];
                        @endphp
                        @if ($event_link['url'])
                            <a href="{{ $event_link['url'] }}" target="{{ $event_link['target'] }}" class="event">
                                @if ($event['time'])
                                    <div class="event-time">{{ $event['time'] }}</div>
                                @endif
                                @if ($event['name'])
                                    <div class="event-name d-flex justify-content-between">
                                        <p class="name">{{ $event['name'] }}</p>
                                        <div class="link-title primary-orange">{{ $event_link['title'] }}</div>
                                    </div>
                                @endif
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
