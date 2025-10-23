@foreach($economy->slice(3,3) as $post) @endforeach

<a href="post_detailes/{{$post->id}}" class="MainPostInLeft" >
    <img src="{{asset($post->image)}}" />
    <h2>{{$post->title}}</h2>
    <p>{{$post->description}}</p>
</a>
