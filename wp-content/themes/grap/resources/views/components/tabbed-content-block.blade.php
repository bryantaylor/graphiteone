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
                            @php
                                $statistics = $tab['statistics'];
                                $details_list = $tab['details_list'];
                                $links_list = $tab['links_list'];
                            @endphp
                            @if ($tab['tab_content_layout'] == 'statistics')
                                <div class="tab-panel" data-index="{{ $index }}">
                                    <div class="content">
                                        @if ($statistics)
                                            @foreach ($statistics as $item)
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
                            @else
                                @if ($tab['tab_content_layout'] == 'detailsList')
                                    <div class="tab-panel" data-index="{{ $index }}">
                                        <div class="details-list">
                                            @if ($details_list)
                                                @if ($details_list['item_details'])
                                                    @foreach ($details_list['item_details'] as $item)
                                                        <div class="details-item">
                                                            <p class="label">{{ $item['label'] }}</p>
                                                            <div class="value h4 primary-orange mb-0">{{ $item['value'] }}</div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @if ($details_list['description'])
                                                    <div class="description h5">{{ $details_list['description'] }}</div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="tab-panel" data-index="{{ $index }}">
                                        <div class="links-list">
                                            @if ($links_list)
                                                @if ($links_list['description'])
                                                    <div class="description ex">{!! $links_list['description'] !!}</div>
                                                @endif
                                                @if ($links_list['links'])
                                                    @foreach ($links_list['links'] as $item)
                                                        <a href="{{ $item['link_item']['url'] }}" target="{{ $item['link_item']['target'] }}"
                                                            class="link-item d-block">{{ $item['link_item']['title'] }}</a>
                                                    @endforeach
                                                @endif
                                                @if ($links_list['button'])
                                                    <a href="{{ $links_list['button']['url'] }}" target="{{ $links_list['button']['target'] }}"
                                                        class="primary-button">{{ $links_list['button']['title'] }}</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
