@extends('main-sidebar.main-sidebar')

@push('styles')
    <link href="{{asset('css/dashboard/index.css')}}" rel="stylesheet" >
@endpush


@section('content')
    <!-- row -->
    <div  id="data" class="row">
        <h1>الاقسام</h1>

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
                                <th class="wd-15p border-bottom-0">.</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->title}}</td>
                                <td>{{ $category->parents ? $category->parents->title : 'قسم رئيسي' }}</td>
                                <td>
                                    <img src="{{asset($category->image)}}" style="width: 50px; height: 40px" >
                                </td>
                                    <td class="actions" >
                                        <form action="{{route('category.edit',$category->id)}}" >
                                            @csrf
                                            <button id="btn" class="btn" type="submit" >Edit</button>
                                        </form>

                                        <button class="delete" >
                                            <a class="btn btn-danger" data-toggle="modal"
                                               data-id="{{$category->id}}"
                                               data-target="#delete"
                                               href="#"

                                            >Delete</a>
                                        </button>
                                        </form>
                                    </td>
                                    <td>.</td>
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
                        <form action="{{route('category.delete')}}" method="post">
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>

@endsection
