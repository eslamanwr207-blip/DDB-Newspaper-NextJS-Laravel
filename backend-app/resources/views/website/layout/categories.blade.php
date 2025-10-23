

<div class="Categories">

    @foreach($categories as $category)
        <div key={category.id} class="Category" >
            <a class="Link" href="/posts/{{$category->id}}">{{$category->title}}</a>
        </div>
    @endforeach




</div>

