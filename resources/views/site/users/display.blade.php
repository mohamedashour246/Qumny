@extends('layouts.sitemaster')

@section('title')
    المستخدمين
@endsection

<style>
    #addContent{
        margin: 50px 50px 20px 0px;
    }
    #add { width: 400px; }
    #users { width: 400px; margin-right: 30px; }
</style>

@section('content')
    <div class="content">
        <div class="row" id="addContent">
            <div class="col-xs-6">
                <button id="add" class="btn bg-blue btn-block btn-float btn-float-lg" data-toggle="modal" data-target="#addModal" type="button" data-toggle="modal" data-target="#exampleModal"><i class="icon-plus3"></i> <span>اضافه</span></button>
            </div>
            <div class="col-xs-6">
                <button id="users" class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-list-numbered"></i> <span>المستخدمين : {{App\User::where('is_Provider',0)->count()}} </span> </button>
            </div>
        </div>

        <table id="dtable" class="text-center table table-bordered table-lg">
            <thead>
            <tr style="background:#EEE">
                <td>#</td>
                <td>الاسم</td>
                <td>الصوره</td>
                <td>البريد الالكتروني</td>
                <td>رقم الجوال</td>
                <td>الاعدادات</td>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><img style="width:160px;height:160px" src="{{URL::to('assets/uploads/avatars/default.png')}}"></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <ul class="icons-list" >
                            <li class="text-success-600">
                                <a href="#" data-toggle="modal" data-target="#editModal" class="openEditModal"
                                   data-id="{{$user->id}}"
                                   data-name="{{$user->name}}"
                                   data-phone="{{$user->phone}}"
                                   data-email="{{$user->email}}"
                                >
                                    <i class="fa fa-2x fa-edit"></i>
                                </a>
                            </li>
                            <li class="text-danger-600">
                                <a class="openDeleteModal" data-toggle="modal" data-target="#deleteModal" data-id="{{$user->id}}">
                                    <i class="fas fa-minus-square fa-2x"></i>
                                </a>

                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            <div class="text-center paginationD">{{ $users->links() }}</div>
            </tbody>
        </table>

    </div>

    <div class="modal fade  custom-imodal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مستخدم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-addpro">
                    <div class="add-form">
                        <div class="contact-page">
                            <form action="{{ route('users.post') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label> اسم المستخدم </label>
                                    <div class="select-div">
                                        <input required="" type="text" name="name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> رقم الجوال </label>
                                    <div class="select-div">
                                        <input required="" type="tel" name="phone" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> البريد الالكترونى </label>
                                    <div class="select-div">
                                        <input required="" type="email" name="email" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> كلمة المرور </label>
                                    <div class="select-div">
                                        <input required="" type="password" name="password" class="form-control" >
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="brown">اضافة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade  custom-imodal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل مستخدم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-addpro">
                    <div class="add-form">
                        <div class="contact-page">
                            <form action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input required="" type="hidden" name="id">
                                <div class="form-group">
                                    <label> اسم المستخدم </label>
                                    <div class="select-div">
                                        <input required="" type="text" name="name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> رقم الجوال </label>
                                    <div class="select-div">
                                        <input required="" type="tel" name="phone" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> البريد الالكترونى </label>
                                    <div class="select-div">
                                        <input required="" type="email" name="email" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> كلمة المرور </label>
                                    <div class="select-div">
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="brown"> تعديل </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> هل أنت متأكد من الحذف <span class="userName"></span> </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.delete') }}" method="post">
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
    <script>
        $(document).on('click','.openEditModal',function () {

            var id = $(this).data('id');
            var name = $(this).data('name');
            var phone = $(this).data('phone');
            var email = $(this).data('email');

            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("input[name='phone']").val(phone);
            $("input[name='email']").val(email);
        });
    </script>

    <script>
        $(document).on('click','.openDeleteModal',function(){
            //get valus
            var id = $(this).data('id');

            //set values in modal inputs
            $("input[name='id']").val(id);
        });
    </script>
@endsection
