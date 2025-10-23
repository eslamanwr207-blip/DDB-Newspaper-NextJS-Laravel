@php
    $post = $policy->first();
@endphp


@if($post)
    <a class="main-post" href="post_detailes/{{$post->id}}">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset($post->image) }}" alt="صورة المقال" />
        <p>{{ $post->description }}</p>
    </a>
@endif
