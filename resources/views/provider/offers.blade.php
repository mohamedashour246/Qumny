@extends('layouts.sitemaster')

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
                        <tr>
                            <td><input class="rocord-check" type="checkbox"></td>
                            <td>1</td>
                            <td><img src="img/user-img.png" class="pro-img" alt=""></td>
                            <td>اسم الوجبة</td>
                            <td>اسم التصنيف</td>
                            <td>52 رس</td>
                            <td>52 رس</td>
                            <td><button type="button" class="edit">تعديل</button></td>
                            <td><button type="button" class="delete">حذف</button></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#add-sub">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                            </td>
                        </tr>
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
                            <form caction="">
                                <div class="form-group">
                                    <label for="">صورة الوجبه</label>
                                    <div class="img-block">
                                        <div class="upload-img">
                                            <i class="fas fa-camera text-white brown"></i>
                                            <input type="file" multiple="" id="gallery-photo-add" name="images[]">
                                        </div>
                                        <div class="image-company">
                                            <img src="img/user-img.png" alt="">
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
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> اختر التصنيف </label>
                                            <div class="select-div">
                                                <select name="" class="form-control" id="">
                                                    <option value="">أخر التصنيف</option>
                                                    <option value="">أخر التصنيف</option>
                                                    <option value="">أخر التصنيف</option>
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
                                                <input type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> الخصم </label>
                                            <div class="select-div">
                                                <input type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> الحد الادني</label>
                                    <div class="select-div">
                                        <input type="number" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> تفاصيل الوجبة</label>
                                    <div class="select-div">
                                        <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="addation">
                                    <h3>اضافات</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="اسم الاضافة">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control" placeholder="سعر الاضافة">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="اسم الاضافة">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control" placeholder="سعر الاضافة">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="اسم الاضافة">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control" placeholder="سعر الاضافة">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit" class="brown">اضافى</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

