@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <div class="container">
    <div class="h2 text-center pt-5 pb-5">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
  </div>
  @endif
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-search')
  @endwhile
  {!! the_posts_navigation(
    array(
        'prev_text' => __('Older posts', 'sage'),
        'next_text' => __('Newer posts', 'sage'),
        'screen_reader_text' => ' ',
    )
); !!}
@endsection
