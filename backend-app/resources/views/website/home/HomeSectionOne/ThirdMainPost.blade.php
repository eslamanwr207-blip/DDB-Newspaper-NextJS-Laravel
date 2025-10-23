<div class='testthird' >

    @foreach($policy->slice(3,8) as $post)

        <a href="post_detailes/{{$post->id}}" class="ThirdMainPost">
        <img src='{{$post->image}}' />

        <h2>{{$post->title}}</h2>

        </a>

    @endforeach



</div>
