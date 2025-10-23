@foreach($economy->slice(6,8) as $post)
    <a href="post_detailes/{{$post->id}}" class="OtherPostsInLeft" >
        <img src="{{asset($post->image)}}" />
        <h2>{{$post->title}}</h2>
    </a>

@endforeach

