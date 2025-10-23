@extends('website.layout.app')

@push('styles')
    <link href="{{asset('css/categories.css')}}" rel="stylesheet" >
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/home.css')}}" rel="stylesheet" >
    <link href="{{asset('css/PostDetaile.css')}}" rel="stylesheet" >

@endpush

@section('content')
    @include('website.layout.navbar')

    <div class="PostDetail" >
        <img src='{{asset($post_details->image)}}' />
        <h2>{{$post_details->title}}</h2>
        <p>{{$post_details->description}}</p>
    </div>

    @include('website.layout.footer')
@endsection



