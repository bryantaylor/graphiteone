@extends('layouts.app')
@section('hero-header')
@include('components.hero-header.hero-header-single')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('single.single-'.get_post_type())
  @endwhile
@endsection
