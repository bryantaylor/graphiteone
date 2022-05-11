@php
$advanced_vertical_block = get_field('advanced_vertical_block');
$title = $advanced_vertical_block['title'];
$content = $advanced_vertical_block['content'];
$button = $advanced_vertical_block['button'];
$statistics = $advanced_vertical_block['statistics'];
@endphp

<div class="advanced-vertical-block">
    <div class="container">
        <div class="block-wrap">
            <div class="title title-border-top">
                @if ($title)
                    <div class="light h4">{{ $title }}</div>
                @endif
            </div>
            <div class="content-wrap">
                @if ($content)
                    <div class="content light">{!! $content !!}</div>
                @endif
                @if ($statistics)
                    <div class="statistics-wrap light">
                        @foreach ($statistics as $item)
                            <div class="statistics-item">
                                @if ($item['big_number'])
                                  <div class="big-number primary-orange">{{ $item['big_number'] }}</div>
                                @endif
                                  <div class="description">
                                    @if ($item['footnote'])
                                    <input type="checkbox" id="footnote">
                                    <label class="description__title name ex" for="footnote">
                                      <span class="label">{{ $item['description'] }}</span>
                                      <div class="more-icon-wrap">
                                        <div class="more-icon">
                                          <span class="dot"></span>
                                          <span class="dot"></span>
                                          <span class="dot"></span>
                                        </div>
                                      </div>
                                    </label>
                                    <div class="discription__footnote name ex">{{ $item['footnote'] }}</div>
                                    @else
                                    <div class="name ex">{{ $item['description'] }}</div>
                                    @endif
                                  </div>
                                @if ($item['name'])
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                @if ($button['title'] && $button['url'])
                    <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="primary-button">{{ $button['title'] }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
