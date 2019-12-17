@extends('layouts.app')

@section('title_specific', 'Home')

@section('content')
    @include('inc.slider')
    @include('inc.about_us')
    @include('inc.services_items')
    @include('inc.our_projects')
    @include('inc.packages')
    @include('inc.contact')
@endsection
