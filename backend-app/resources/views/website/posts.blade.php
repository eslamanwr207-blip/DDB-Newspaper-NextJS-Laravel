@extends('website.layout.app')

@push('styles')
    <link href="{{asset('css/categories.css')}}" rel="stylesheet" >
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/home.css')}}" rel="stylesheet" >


    <link href="{{asset('css/posts.css')}}" rel="stylesheet" >
    <link href="{{asset('css/home/home.css')}}" rel="stylesheet" >


@endpush
@section('content')
    @include('website.layout.navbar')


    <div class='Posts' >

        @foreach($posts as $post)


        <a href="/post_detailes/{{$post->id}}" class="Post" >
        <img src={{asset($post->image)}} />
        <h2>{{$post->title}}</h2>
        </a>

        @endforeach
    </div>




    @include('website.layout.footer')
@endsection
