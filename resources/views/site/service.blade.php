@extends('layouts.sitemaster')
@section('title')
    التصنيفات
@endsection
<style>
    td{
        text-align: right;
    }
</style>

@section('content')
    <div class="content">
        <div class="d-table">
            <div class="container">
                <div class="table-option">
                    <div class="detele-option">
                        <input class="delete-all" type="checkbox" name="" id="">
                        <label>
                            تحديد الكل
                        </label>
                        <button class="btn-all">حذف</button>
                    </div>
                    <div class="add-service">
                        <button type="button" data-toggle="modal" data-target="#add-sub">
                            <i class="fas fa-plus-square"></i>
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>رقم</th>
                            <th>أسم المنيو</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td><input class="rocord-check" type="checkbox"></td>
                                <td>{{ $slider->id }}</td>
                                <td> {{$slider->name}} </td>
                                <td>
                                    <a  href="" data-toggle="modal"  class="openEditModal" data-target="#editModal"
                                        data-id="{{$slider->id}}"
                                        data-name="{{$slider->name}}"
                                    >
                                        <i class="fa fa-2x fa-edit"></i>
                                    </a>

                                </td>
                                <td>
                                    <a href="" data-toggle="modal" class="openDeleteModal" data-target="#deleteModal" data-id="{{$slider->id}}">
                                        <i class="fas fa-minus-square fa-2x"></i>
                                    </a>

                                <td>
                                    <a href=""  data-toggle="modal" data-target="#add-sub">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- add-serv -->
    {{--    <div class="modal fade add-serv" id="add-serv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
    {{--         aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-body">--}}
    {{--                    <p>اضافة تصنيف</p>--}}
    {{--                    <form action="" method="post">--}}
    {{--                        {{csrf_field()}}--}}
    {{--                        <input required="" type="text" name="name" class="form-control" id="" placeholder="أسم الخدمة">--}}
    {{--                        <input type="button" class="add-row" value="أضافة" data-dismiss="modal">--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- add-serv -->
    <div class="modal fade add-serv" id="add-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>اضافة قسم فرعي </p>
                    <form action="{{route('sliders.post')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="name" id="" placeholder="أسم الخدمة">
                        <button type="submit" class="btn btn-primary" >اضافه </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit-serv -->

    <div class="modal fade add-serv" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p> تعديل اسم التصنيف </p>
                    <form action="{{ route('sliders.update') }}" method="post">
                        {{csrf_field()}}
                        <input required="" type="hidden" name="id" value="">
                        <input required="" type="text" class="form-control" name="name" id="" placeholder="اسم التصنيف">
                        <button type="submit" class="btn btn-primary" > تعديل </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete model  -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> هل أنت متأكد من الحذف <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliders.delete') }}" method="post">
                        <!-- token and user id -->
                        {{csrf_field()}}
                        <input required="" type="hidden" name="id" value="">
                        <!-- /token and user id -->
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary" >تأكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <!--- edit Modal --->
    <script type="text/javascript">
        $(document).on('click','.openEditModal', function () {
            //get Values

            var id = $(this).data('id');
            var name = $(this).data('name');

            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
        });
    </script>

    <!--delete--->
    <script>
        $(document).on('click','.openDeleteModal',function(){
            //get valus
            var id = $(this).data('id');

            //set values in modal inputs
            $("input[name='id']").val(id);
        });
    </script>
@endsection
