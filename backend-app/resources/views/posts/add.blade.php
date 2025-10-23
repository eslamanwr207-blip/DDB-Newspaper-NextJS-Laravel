@extends('main-sidebar.main-sidebar')

@push('styles')
    <link href="{{asset('css/dashboard/index.css')}}" rel="stylesheet" >
@endpush

@section('content')

        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data"  >
            <h1>اضافة منشور</h1>

            @csrf
            <div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">الصورة : -</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                </div>
                <div>
                    <label for="formFile" class="form-label" style="text-align: right" >القسم : -</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <option value="0" selected>--حدد القسم--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <br/>

            </div>


            <hr/>
            <br/>

            <div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach(config('app.languages') as $key=>$lang)
                            <button class="nav-link @if($loop->index == 0) active @endif" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$lang}}</button>
                        @endforeach
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <br/>
                    @foreach(config('app.languages') as $key=>$lang)

                        <div class="tab-pane fade show @if($loop->index == 0) active @endif" id="{{$key}}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">{{$lang}}</label>
                                <input type="text" class="form-control" name="{{$key}}[title]" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">{{$lang}}</label>
                                <textarea class="form-control" name="{{$key}}[smalDesc]" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">{{$lang}}</label>
                                <textarea class="form-control" name="{{$key}}[description]" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" id="btn" class="btn" >ادخال</button>

        </form>

@endsection

