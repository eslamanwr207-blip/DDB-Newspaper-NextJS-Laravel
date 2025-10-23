@extends('website.layout.app')

@push('styles')
    <link href="{{asset('css/categories.css')}}" rel="stylesheet" >
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/home.css')}}" rel="stylesheet" >

    <link href="{{asset('css/home/HomeSectionOne/HomeSectionOne.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionOne/MainPost.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionOne/SecondMainPost.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionOne/ThirdMainPost.css')}}" rel="stylesheet" >

    <link href="{{asset('css/home/HomeSectionTow/HomeSectionTow.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionTow/MainPostInSectionTow.css')}}" rel="stylesheet" >



    <link href="{{asset('css/home/HomeSectionTow/PostsInLeft/PostsInLeft.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionTow/PostsInLeft/MainPostInLeft.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionTow/PostsInLeft/OtherPostsInLeft.css')}}" rel="stylesheet" >


    <link href="{{asset('css/home/HomeSectionThree/HomeSectionThree.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/HomeSectionThree/PostsSectionThree.css')}}" rel="stylesheet" >






@endpush
@section('content')
    @include('website.layout.navbar')

        <div class="home" >
            @include('website.home.HomeSectionOne.HomeSectionOne')
            <br/>
            <br/>
            <br/>
            <hr/>
            @include('website.home.HomeSectionTow.HomeSectionTow')

            <br/>
            <br/>
            @include('website.home.HomeSectionThree.HomeSectionThree')
        </div>


    @include('website.layout.footer')
@endsection
