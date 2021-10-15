@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('single.single-'.get_post_type())
  @endwhile
@endsection
