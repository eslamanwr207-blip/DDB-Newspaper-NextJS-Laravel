@extends('main-sidebar.main-sidebar')

@push('styles')
    <link href="{{asset('css/dashboard/index.css')}}" rel="stylesheet" >
@endpush

@section('content')
    <!-- row -->
    <div class="row">
        <div class="settings" >
            <h1>الاعدادات</h1>

            <form action="{{route('settings.update', $settings)}}" method="post" enctype="multipart/form-data" class="mb-10">
                @csrf

                <div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$settings->email}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputFacebook" class="form-label">رابط حساب الفيسبوك</label>
                        <input type="text" name="facebook" class="form-control" id="exampleInputFacebook" aria-describedby="FacebookHelp" value="{{$settings->facebook}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputX" class="form-label">رابط حساب اكس</label>
                        <input type="text" name="x" class="form-control" id="exampleInputX" aria-describedby="XHelp" value="{{$settings->x}}">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">الشعار الرئيسي</label>
                        <input name="logo" class="form-control" type="file" id="formFile" >
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">الايقونة</label>
                        <input name="favicon" class="form-control" type="file" id="formFile">
                    </div>

                </div>
                <br/>
                <hr/>
                <br/>


                <div>
                    <h3 style="margin-bottom: 20px" >الترجمة</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach(config('app.languages') as $key=>$lang)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if($loop->index == 0) active" @endif id="home-tab" data-bs-toggle="tab" data-bs-target="#{{$key}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$lang}}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach(config('app.languages') as $key=>$lang)

                            <div class="tab-pane @if($loop->index == 0) active @endif " id="{{$key}}" role="tabpanel" aria-labelledby="home-tab">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{$lang}}</label>
                                    <input type="text" name="{{$key}}[title]" class="form-control" id="exampleFormControlInput1" value="{{$settings->translate($key)->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{$lang}}</label>
                                    <textarea class="form-control" name="{{$key}}[description]" id="exampleFormControlTextarea1" rows="3" >{{$settings->translate($key)->description}}</textarea>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <script>
                    var firstTabEl = document.querySelector('#myTab li:last-child a')
                    var firstTab = new bootstrap.Tab(firstTabEl)

                    firstTab.show()
                </script>



        <button type="submit" id="btn" class="btn">ادخال</button>

        </form>
        </div>
    <!-- row closed -->
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
