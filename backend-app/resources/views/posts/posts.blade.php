@extends('main-sidebar.main-sidebar')

@push('styles')
    <link href="{{asset('css/dashboard/index.css')}}" rel="stylesheet" >
@endpush


@section('content')
    <!-- row -->
    <div id="data" class="row">
        <h1>المنشورات</h1>

        <div class="col-xl-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">الاسم</th>
                                <th class="wd-15p border-bottom-0">القسم</th>
                                <th class="wd-20p border-bottom-0">الصورة</th>
                                <th class="wd-15p border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{ $post->category ? $post->category->title : 'بدون تصنيف' }}</td>
                                    <td>
                                        <img src="{{asset($post->image)}}" style="width: 50px; height: 40px" >
                                    </td>
                                    <td class="actions" >
                                        <form action="{{route('post.edit',$post->id)}}" >
                                            @csrf
                                            <button id="btn" class="btn" type="submit" >Edit</button>
                                        </form>


                                        <button class="delete" >
                                            <a class="btn btn-danger" data-toggle="modal"
                                               data-id="{{$post->id}}"
                                               data-target="#delete"
                                               href="#"

                                            >Delete</a>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{route('post.delete')}}" method="post">
                        @csrf
                    </div>
                    <div class="modal-body">
                        هل انت متاكد من عملية الحذف ؟
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>

@endsection
