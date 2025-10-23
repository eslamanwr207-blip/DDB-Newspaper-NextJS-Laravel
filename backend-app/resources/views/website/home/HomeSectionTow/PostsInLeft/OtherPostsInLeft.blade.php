@foreach($economy->slice(2,3) as $post)
    <a href="post_detailes/{{$post->id}}" key={key} class="OtherPostsInLeft" >
        <img src="{{asset($post->image)}}" />
        <h2>{{$post->title}}</h2>
    </a>

@endforeach

