<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required|numeric',
            'password' => 'required'
        ],
            [
                'phone.required'=>'من فضلك قم بتسجيل رقم الجوال',
                'phone.numeric'=>'من فضلك قم بتسجيل رقم جوال صحيح',
                'password.required' => 'من فضلك قم بتسجيل الرقم السري'
            ]
        );

        if(!Auth::attempt(['phone' => $request['phone'] , 'password' => $request['password']]))
        {
            $msg = "رقم الجوال أو كلمه المرور غير صحيحه! حاول مره أخري.";
            return redirect()->back()->with(['fail' => $msg]);
        }

        return redirect()->route('dashboard');
    }

    public function getDashboard()
    {
        $users = User::where('is_Provider',0)->orderBy('created_at','desc')->get();
        $admins = User::where('is_Provider',1)->orderBy('created_at','desc')->get();

        return view('dashboard.index',compact('users','admins'));
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
