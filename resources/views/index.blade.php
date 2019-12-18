@extends('layouts.public.app')

@section('title_specific', 'Home')

@section('content')
    @include('inc.slider')
    @include('inc.about_us')
    @include('inc.services')
    @include('inc.projects')
    @include('inc.pricing')
    @include('inc.contact_us')
@endsection
