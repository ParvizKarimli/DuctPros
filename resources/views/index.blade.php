@extends('layouts.app')

@section('title_specific', 'Home')

@section('content')
    @include('inc.slider')
    @include('inc.services_items')
    @include('inc.get_now')
    @include('inc.about_us')
    @include('inc.our_projects')
    @include('inc.faq')
    @include('inc.appointment')
    @include('inc.counter')
    @include('inc.packages')
    @include('inc.team')
    @include('inc.blog')
    @include('inc.reviews')
    @include('inc.clients')
@endsection
