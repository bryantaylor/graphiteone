@php
  $share_structure_block = get_field('share_structure_block');
  $title = $share_structure_block['title'];
  $share_structure = $share_structure_block['share_structure'];
  $share_structure_items = $share_structure['item_details'];


  App\console_dump($share_structure);
@endphp

<section class="share-structure">
  <div class="container">
    <div class="block-wrap">
      <div class="title title-border-top">
        @if ($title)
          <div class="light h4">{{ $title }}</div>
        @endif
      </div>
      <div class="share-structure__content">
        @if ($share_structure_items)
        @foreach ($share_structure_items as $item)
        <div class="details-item">
          <p class="label">{{ $item['label'] }}</p>
          <div class="value h4 primary-orange mb-0">{{ $item['value'] }}</div>
        </div>
        @endforeach
        @endif
        @if ($share_structure['description'])
        <div class="description h5">{{ $share_structure['description'] }}</div>
        @endif
      </div>
    </div>
  </div>
</section>
