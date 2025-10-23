<div class='SecondMainPost' >
    @foreach($policy->slice(1, 2) as $post)
        <a href="post_detailes/{{$post->id}} class="SecondMainPostLink" >

            <img src='{{asset($post->image)}}' />
            <h2>{{$post->title}}</h2>
            <p>{{$post->description}}</p>

        </a>
    @endforeach





</div>
