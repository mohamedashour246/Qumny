<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function getSliders()
    {
        $sliders = Slider::orderBy('created_at','desc')->get();
        return view('site.service',compact('sliders'));
    }

    public function postSliders(Request $request)
    {
        $this->validate($request , [
             'name'  =>  'required'
        ],
        [
            'name.required' => 'من فضلك ادخل اسم التصنيف'
        ]);

        $slider = new Slider();
        $slider->name = $request['name'];
        $slider->save();

        return redirect()->back()->with(['success' => 'تم الاضافة بنجاح']);
    }

    public function updateSliders(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ],
            [
                'name.required' => 'من فضلك ادخل اسم التصنيف'
            ]
        );
        $slider = Slider::find($request['id']);

        $slider->name = $request['name'];
        $slider->update();

        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }

    public function deleteSliders(Request $request)
    {
        $slider = Slider::find($request['id']);
        if(!$slider)
        {
            return redirect()->back()->with(['fail' => 'لا توجد تصنيفات']);
        }
        $slider->delete();

        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }

}
