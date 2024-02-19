@extends('layouts.site')

@section('title')
    Bosh sahifa
@endsection

@section('content')

    <!-- Main News Slider Start -->
    @include('components.site.mainNewsSlider')
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->
    @include('components.site.breakingNews')
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    @include('components.site.featuredNews')
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    @include('components.site.newsWithSidebar')
    <!-- News With Sidebar End -->


@endsection