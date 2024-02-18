@extends('layouts.master')

@section('title')
    المنتجات
@endsection

<style>
    /*#addContent{*/
    /*    margin: 50px 50px 20px 0px;*/
    /*}*/
</style>

@section('content')
    <div class="content">
        <div class="row" id="addContent" style="margin-bottom: 20px">
            <div class="col-xs-6">
                <button id="add" class="btn bg-blue btn-block btn-float btn-float-lg" data-toggle="modal" data-target="#addModal" type="button"><i class="icon-plus3"></i> <span>اضافه</span></button>
            </div>
            <div class="col-xs-6">
                <button id="users" class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-list-numbered"></i> <span>المنتجات : {{App\Models\Product::count()}} </span> </button>
            </div>
        </div>

        <table id="dtable" class="text-center table table-bordered table-lg">
            <thead>
            <tr style="background:#EEE">
                <td>رقم</td>
                <td>الاسم</td>
                <td>الصوره</td>
                <td>التصنيف</td>
                <td>السعر</td>
                <td>الخصم</td>
                <td>الاعدادات</td>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img style="width:160px;height:160px" src="{{URL::to('assets/uploads/products/'.$product->image)}}"></td>
                    <td>{{$product->slider->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount}}</td>
                    <td>
                        <ul class="icons-list" >
                            <li class="text-success-600">
                                <a href="#" data-toggle="modal" data-target="#EditModal" class="openEditModal"
                                   data-id="{{$product->id}}"
                                   data-image="{{$product->image}}"
                                   data-name="{{$product->name}}"
                                   data-slider_id="{{$product->slider_id}}"
                                   data-user_id="{{$product->user_id}}"
                                   data-price="{{$product->price}}"
                                   data-discount="{{$product->discount}}"
                                   data-details="{{$product->details}}"
                                   data-min="{{$product->minCost}}"
                                   data-product_add="{{$product->product_Add}}"
                                   data-product_cost="{{$product->product_cost}}"
                                >
                                    <i class="fa fa-2x fa-edit"></i>
                                </a>
                            </li>
                            <li class="text-danger-600">
                                <a class="openDeleteModal" data-toggle="modal" data-target="#deleteModal" data-id="{{$product->id}}">
                                    <i class="fa fa-2x fa-minus-square"></i>
                                </a>

                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            <div class="text-center paginationD">{{ $products->links() }}</div>
            </tbody>
        </table>

    </div>

    <div class="modal fade  custom-imodal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة منتج</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-addpro">
                    <div class="add-form">
                        <div class="contact-page">
                            <form action="{{ route('admin.products.post') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">صورة الوجبه</label>
                                    <div class="img-block">
                                        <div class="upload-img">
                                            <i class="fas fa-camera text-white brown"></i>
                                            <input required="" type="file" multiple="" id="gallery-photo-add" name="image">
                                        </div>
                                        <div class="image-company">
                                            <img src="{{ asset('assets/uploads/products/') }}" alt="">
                                        </div>
                                        <div class="gallery">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> أسم الوجبه </label>
                                            <div class="select-div">
                                                <input required="" type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> اختر التصنيف </label>
                                            <div class="select-div">
                                                <select required="" name="slider_id" class="form-control">
                                                    @foreach($sliders as $slider)
                                                        <option value="{{$slider->id}}"> {{$slider->name}} </option>
                                                    @endforeach
                                                </select>
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> السعر</label>
                                            <div class="select-div">
                                                <input required="" type="number" name="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> الخصم </label>
                                            <div class="select-div">
                                                <input required="" type="number" name="discount" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>اختر المستخدم</label>
                                    <div class="select-div">
                                        <select required="" name="user_id" class="form-control">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}"> {{$user->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> الحد الادني</label>
                                    <div class="select-div">
                                        <input required="" type="number" name="minCost" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> تفاصيل الوجبة</label>
                                    <div class="select-div">
                                        <textarea required="" name="details" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="addation">
                                    <h3>اضافات</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="text" name="product_Add" class="form-control" placeholder="اسم الاضافة">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="number" name="product_cost" class="form-control" placeholder="سعر الاضافة">
                                            </div>
                                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">تعديل منتج</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-addpro">
                    <div class="add-form">
                        <div class="contact-page">
                            <form action="{{ route('admin.products.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input required="" type="hidden" name="id" value="">
                                <div class="form-group">
                                    <label for="">صورة الوجبه</label>
                                    <div class="img-block">
                                        <div class="upload-img">
                                            <i class="fas fa-camera text-white brown"></i>
                                            <input type="file" multiple="" id="gallery-photo-add" name="image">
                                        </div>
                                        <div class="image-company">
                                            <img src="{{ asset('assets/uploads/products/') }}" alt="">
                                        </div>
                                        <div class="gallery">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> أسم الوجبه </label>
                                            <div class="select-div">
                                                <input required="" type="text" name="name" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> اختر التصنيف </label>
                                            <div class="select-div">
                                                <select required="" name="slider_id" class="form-control">
                                                    @foreach($sliders as $slider)
                                                        <option value="{{$slider->id}}"> {{$slider->name}} </option>
                                                    @endforeach
                                                </select>
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> السعر</label>
                                            <div class="select-div">
                                                <input required="" type="number" name="price" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> الخصم </label>
                                            <div class="select-div">
                                                <input required="" type="number" name="discount" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>اختر المستخدم</label>
                                    <div class="select-div">
                                        <select required="" name="user_id" class="form-control">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}"> {{$user->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> الحد الادني</label>
                                    <div class="select-div">
                                        <input required="" type="number" name="min" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> تفاصيل الوجبة</label>
                                    <div class="select-div">
                                        <textarea required="" name="details" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="addation">
                                    <h3>اضافات</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="text" name="product_add" class="form-control" placeholder="اسم الاضافة">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="number" name="product_cost" class="form-control" placeholder="سعر الاضافة">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="brown">تعديل</button>
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
                    <form action="{{ route('admin.products.delete') }}" method="post">
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
            var slider_id = $(this).data('slider_id');
            var user_id = $(this).data('user_id');
            var price = $(this).data('price');
            var discount = $(this).data('discount');
            var min = $(this).data('min');
            var details = $(this).data('details');
            var product_add = $(this).data('product_add');
            var product_cost = $(this).data('product_cost');


            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("select[name='slider_id']").val(slider_id);
            $("select[name='user_id']").val(user_id);
            $("input[name='price']").val(price);
            $("input[name='discount']").val(discount);
            $("input[name='min']").val(min);
            $("textarea[name='details']").val(details);
            $("input[name='product_add']").val(product_add);
            $("input[name='product_cost']").val(product_cost);
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
