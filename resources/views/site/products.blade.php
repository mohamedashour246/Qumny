@extends('layouts.sitemaster')
@section('title')
    المنتجات
@endsection

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
                            <th>الصورة</th>
                            <th>أسم المنتج</th>
                            <th>التصنيف</th>
                            <th>السعر</th>
                            <th>لخصم</th>
                            <th>تعديل</th>
                            <th>خذف</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            @if(Auth::user()->id == $product->user_id)
                                <tr>
                                    <td><input class="rocord-check" type="checkbox"></td>
                                    <td> {{ $product->id }} </td>
                                    <td><img src="{{ asset('assets/uploads/products/'.$product->image) }} " class="pro-img" alt=""></td>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $product->slider->name }} </td>
                                    <td> {{ $product->price }} </td>
                                    <td> {{  $product->discount }} </td>
                                    <td>
                                        {{--                                    <button type="button" class="edit">تعديل</button>--}}
                                        <a href="" data-toggle="modal" class="openEditModal" data-target="#editModal"
                                           data-id="{{$product->id}}"
                                           data-image="{{$product->image}}"
                                           data-name="{{$product->name}}"
                                           data-slider_id="{{$product->slider_id}}"
                                           data-price="{{$product->price}}"
                                           data-discount="{{$product->discount}}"
                                           data-details="{{$product->details}}"
                                           data-min="{{$product->minCost}}"
                                           data-product_Add="{{$product->product_Add}}"
                                           data-product_cost="{{$product->product_cost}}"
                                        >
                                            <i class="fa fa-2x fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" class="openDeleteModal" data-target="#deleteModal" data-id="{{$product->id}}">
                                            <i class="fas fa-minus-square fa-2x"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#add-sub">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- notification -->
    <!-- add-serv -->
    <!-- add-serv -->
    <!-- modal condation -->
    <div class="modal fade  custom-imodal" id="add-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form action="{{ route('products.post') }}" method="post" enctype="multipart/form-data">
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

    <!---edit modal --->
    <div class="modal fade  custom-imodal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
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
                                    <button type="submit" class="brown">تعديل</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    <form action="{{ route('products.delete') }}" method="post">
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
        $(document).on('click','.openEditModal',function () {
            //get Values

            var id = $(this).data('id');
            var name = $(this).data('name');
            var slider_id = $(this).data('slider_id');
            var price = $(this).data('price');
            var discount = $(this).data('discount');
            var minCost = $(this).data('min');
            var details = $(this).data('details');
            var product_Add = $(this).data('product_Add');
            var product_cost = $(this).data('product_cost');

            //set values in modal inputs
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("select[name='slider_id']").val(slider_id);
            $("input[name='price']").val(price);
            $("input[name='discount']").val(discount);
            $("input[name='min']").val(minCost);
            $("textarea[name='details']").val(details);
            $("input[name='product_Add']").val(product_Add);
            $("input[name='product_cost']").val(product_cost);
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
