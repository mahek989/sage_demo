{{--
  Template Name: X-Five Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-xfive')
  @endwhile
@endsection
