<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function getProfile()
    {
        return view('site.profile');
    }

    public function getStore()
    {
        return view('site.store');
    }

    public function getJoins()
    {
        return view('site.joins');
    }

    public function getUsers()
    {
        $users = User::where('is_Provider',0)->orderBy('created_at','desc')->paginate(6);
        return view('dashboard.users.display',compact('users'));
    }

    public function postUsers(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],
         [
             'email.required'=>'من فضلك قم بتسجيل البريد الالكتروني',
             'email.unique'=>'البريد الالكتروني مستخدم من قبل',
             'email.email'=>'من فضلك قم بتسجيل بريد الكتروني صحيح',
             'name.required'=>'من فضلك قم بتسجيل الاسم',
             'phone' => 'من فضلك قم بتسجيل رقم الجوال',
             'phone.unique' => 'من فضلك قم بتسجيل رقم جوال صحيح',
             'password.required'=>'من فضلك قم بتسجيل كلمه المرور',
             'password.min'=>'يجب ألا تقل كلمه المرور عن 6 حروف'
         ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->is_Active = 1;
        $user->save();

        return redirect()->back()->with(['success','تم الاضافة بنجاح']);
    }

    public function updateUsers(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'nullable|min:6',
        ],
            [
                'email.required'=>'من فضلك قم بتسجيل البريد الالكتروني',
                'email.unique'=>'البريد الالكتروني مستخدم من قبل',
                'email.email'=>'من فضلك قم بتسجيل بريد الكتروني صحيح',
                'name.required'=>'من فضلك قم بتسجيل الاسم',
                'phone' => 'من فضلك قم بتسجيل رقم الجوال',
                'phone.unique' => 'رقم الجوال مستخدم من قبل',
                'password.min'=>'يجب ألا تقل كلمه المرور عن 6 حروف'
            ]);

        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->update();

        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }

    public function deleteUsers(Request $request)
    {
        $user = User::find($request['id']);
        if(!$user)
        {
            return redirect()->back()->with(['fail' => 'لا يوجد مستخدمين']);
        }
        $user->delete();

        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }
}
