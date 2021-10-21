@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    @if (!have_posts())
        <div class="container">
            <div class="text-center">
                {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
            </div>
            <div class="text-center mt-4">
                <a class="primary-button" href="/">Go Home</a>
            </div>
        </div>
    @endif
@endsection
