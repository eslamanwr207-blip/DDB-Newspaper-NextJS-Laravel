@foreach($sports->slice(0,3) as $post)


    <a href="post_detailes/{{$post->id}}"  class="PostsSectionThree" >
        <img src="{{asset($post->image)}}" />
        <h2>{{$post->title}}</h2>
            <p>{{$post->description}}</p>
    </a>

@endforeach
