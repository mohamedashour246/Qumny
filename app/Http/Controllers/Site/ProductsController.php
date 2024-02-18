<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $products = Product::orderBy('created_at','desc')->get();
        $sliders = Slider::all();
        return view('site.products',compact('products','sliders'));
    }

    public function postProducts(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'slider_id' => 'required',
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
                'discount.required'=>'من فضلك قم بتسجيل الخصم',
                'minCost.required'=>'من فضلك قم بتسجيل الحد الادنى',
                'details.required'=>'من فضلك قم بتسجيل التفاصيل',
            ]
        );

        $slider = Slider::find($request['slider_id']);
        if(!$slider) {
            return redirect()->back()->with(['fail' => 'لا توجد تصنيفات']);
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
        $product->user_id = Auth::user()->id;
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
            'price' => 'required',
            'discount' => 'required',
            'min' => 'required',
            'details' => 'required',
        ],[
                'image.mimes'=>'من فضلك قم باختيار صوره صحيحه',
                'name.required'=>'من فضلك قم بتسجيل الاسم',
                'price.required'=>'من فضلك قم بتسجيل السعر',
                'slider_id.required'=>'من فضلك قم بتسجيل التصنيف',
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
        $product->user_id = Auth::user()->id;
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->minCost = $request['min'];
        $product->details = $request['details'];
        $product->product_Add = $request['product_Add'];
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
