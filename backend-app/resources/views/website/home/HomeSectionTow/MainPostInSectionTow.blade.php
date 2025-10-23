@foreach($economy->slice(0,1) as $post)
    <a href="post_detailes/{{$post->id}}" class="MainPostInSectionTow" >
        <img src="{{asset($post->image)}}" />
        <h2>{{$post->title}}</h2>
        <p>{{$post->description}}</p>
    <hr/>
    </a>
@endforeach
