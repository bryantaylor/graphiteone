@php
$tabbed_content_block = get_field('tabbed_content_block');
$title = $tabbed_content_block['title'];
$tabs = $tabbed_content_block['tabs'];
@endphp

<div class="tabbed-content-block">
    <div class="container">
        <div class="block-wrap">
            <div class="title title-border-top">
                @if ($title)
                    <div class="light h4">{{ $title }}</div>
                @endif
            </div>
            @if ($tabs)
                <div class="tabs-group light">
                    <div class="tabs">
                        @foreach ($tabs as $index => $tab)
                            <div class="tab {{ $index == '0' ? 'active' : '' }}" data-index="{{ $index }}">
                                @if ($tab['tab_name'])
                                    <div class="name h4">{{ $tab['tab_name'] }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="tabs-content">
                        @foreach ($tabs as $index => $tab)
                            <div class="tab-panel" data-index="{{ $index }}">
                                <div class="content">
                                    @if ($tab['tab_content'])
                                        @foreach ($tab['tab_content'] as $item)
                                            <div class="content-item">
                                                <div class="data-wrap">
                                                    @if ($item['big_number'])
                                                        <div class="big-number primary-orange">{{ $item['big_number'] }}</div>
                                                    @endif
                                                    @if ($item['unit'])
                                                        <div class="unit">{{ $item['unit'] }}</div>
                                                    @endif
                                                </div>
                                                @if ($item['description'])
                                                    <div class="description">{{ $item['description'] }}</div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
