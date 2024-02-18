<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $sliders = Slider::all();
        $products = Product::orderBy('created_at','desc')->paginate(8);
        $users = User::where('is_Provider',0)->orderBy('created_at','desc')->get();
        return view('dashboard.products.display',compact('sliders','products','users'));
    }

    public function postProducts(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'slider_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'minCost' => 'required',
            'details' => 'required',
        ],
            [
                'image.required'=>'من فضلك قم باختيار صوره',
                'image.mimes'=>'من فضلك قم باختيار صوره صحيحه',
                'name.required'=>'من فضلك قم بتسجيل الاسم',
                'price.required'=>'من فضلك قم بتسجيل السعر',
                'slider_id.required'=>'من فضلك قم بتسجيل التصنيف',
                'user_id.required'=>'من فضلك قم بتسجيل المستخدم',
                'discount.required'=>'من فضلك قم بتسجيل الخصم',
                'minCost.required'=>'من فضلك قم بتسجيل الحد الادنى',
                'details.required'=>'من فضلك قم بتسجيل التفاصيل',
            ]
        );

        $slider = Slider::find($request['slider_id']);
        if(!$slider) {
            return redirect()->back()->with(['fail' => 'لا توجد تصنيفات']);
        }
        $user = User::find($request['user_id']);
        if(!$user) {
            return redirect()->back()->with(['fail' => 'لا يوجد مستخدمين']);
        }

        if($request['image']){
            $file = $request->file('image');
            $path = "assets/uploads/products/";
            $random = rand(1111,9999);
            $name = rand(1111111,9999999);
            $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        $product = new Product();
        $product->name = $request['name'];
        $product->image = $fileName;
        $product->slider_id = $request['slider_id'];
        $product->user_id = $request['user_id'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->minCost = $request['minCost'];
        $product->details = $request['details'];
        $product->product_Add = $request['product_Add'];
        $product->product_cost = $request['product_cost'];
        $product->save();

        return redirect()->back()->with(['success' => 'تم الاضافة بنجاح']);
    }

    public function updateProducts(Request $request)
    {
        $this->validate($request, [
            'image' => 'nullable|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'slider_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'min' => 'required',
            'details' => 'required',
        ],[
                'image.mimes'=>'من فضلك قم باختيار صوره صحيحه',
                'name.required'=>'من فضلك قم بتسجيل الاسم',
                'price.required'=>'من فضلك قم بتسجيل السعر',
                'slider_id.required'=>'من فضلك قم بتسجيل التصنيف',
                'user_id.required'=>'من فضلك قم بتسجيل المستخدم',
                'discount.required'=>'من فضلك قم بتسجيل الخصم',
                'min.required'=>'من فضلك قم بتسجيل الحد الادنى',
                'details.required'=>'من فضلك قم بتسجيل التفاصيل',
            ]
        );

        $slider = Slider::find($request['slider_id']);
        if(!$slider)
        {
            return redirect()->back()->with(['fail' => 'لا توجد تصنيفات']);
        }
        $product = Product::find($request['id']);

        if($request['image']){
            $file = $request->file('image');
            $path   = "assets/uploads/products/";
            $random = rand(1111,9999);
            $name = rand(1111111,9999999);
            $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $product->image = $fileName;
        }
        $product->name = $request['name'];
        $product->slider_id = $request['slider_id'];
        $product->user_id = $request['user_id'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->minCost = $request['min'];
        $product->details = $request['details'];
        $product->product_Add = $request['product_add'];
        $product->product_cost = $request['product_cost'];
        $product->update();

        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }

    public function deleteProducts(Request $request)
    {
        $product = Product::find($request['id']);
        if(!$product)
        {
            return redirect()->back()->with(['fail' => 'لا توجد منتجات']);
        }
        $product->delete();

        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    }
}
