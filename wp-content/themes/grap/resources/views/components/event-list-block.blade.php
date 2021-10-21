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
            <div class="event-list light">
                @if ($event_list)
                    @foreach ($event_list as $event)
                        <div class="event">
                            @if ($event['time'])
                                <div class="event-time">{{ $event['time'] }}</div>
                            @endif
                            @if ($event['name'])
                                <div class="event-name">{{ $event['name'] }}</div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
