@php
$tab_block = get_field('tab_block');
@endphp

@if ($tab_block)
    <div class="tab-block light">
        <div class="container">
            <div class="block-wrap">
                <div class="tabs title-border-top">
                    @foreach ($tab_block as $index => $tab)
                        @php
                            $tab_icon = $tab['icon'];
                            $tab_name = $tab['name'];
                        @endphp
                        <div class="tab d-flex align-items-center {{ $index == '0' ? 'active' : '' }}" data-index="{{ $index }}">
                            @if ($tab_icon)
                                <img src="{{ $tab_icon['url'] }}" alt="" class="icon">
                            @endif
                            @if ($tab_name)
                                <div class="name h4">{{ $tab_name }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="tabs-content">
                    @foreach ($tab_block as $index => $tab)
                        @php
                            $tab_content = $tab['content'];
                            $tab_btn = $tab['button'];
                        @endphp
                        <div class="tab-panel" data-index="{{ $index }}">
                            @if ($tab_content)
                                <div class="content">{!! $tab_content !!}</div>
                            @endif
                            @if ($tab_btn['title'] && $tab_btn['url'])
                                <a href="{{ $tab_btn['url'] }}" target="{{ $tab_btn['target'] }}"
                                    class="primary-button">{{ $tab_btn['title'] }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
