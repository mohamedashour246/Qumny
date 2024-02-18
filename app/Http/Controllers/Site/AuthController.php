<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('site.register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'comNumber' => 'required|numeric',
            'password' => 'required|min:6',
            'confirmation_password' => 'required|same:password'
        ]);

        if ($validator->passes()) {
            $email = $request['email'];
            $emailUsed = User::where('email',$email)->first();

            if($emailUsed)
            {
                $msg = 'البريد الالكتروني مستخدم من قبل';
                return response()->json([
                    'key' => 'fail',
                    'msg' => $msg
                ]);
            }

            $user = new User();
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->email = $email;
            $user->comNumber = $request['comNumber'];
            $user->password = bcrypt($request['password']);
            $user->is_Active = 1;
            $user->save();

            Auth::login($user);

            $msg = route('main');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);
        }
        else {
            foreach ((array) $validator->errors() as $value){
                if(isset($value['name'])) {
                    $msg = 'اسم المستخدم مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif(isset($value['phone'])) {
                    $msg = 'رقم الجوال مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif(isset($value['email'])) {
                    $msg = 'البريد الالكترونى مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif(isset($value['comNumber'])) {
                    $msg = 'السجل التجارى مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif(isset($value['password'])) {
                    $msg = 'يجب ألا تقل كلمه المرور عن ٦ حروف';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif(isset($value['confirmation_password'])) {
                    $msg = 'يجب تطابق كلمتي المرور';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }

   public function getLogin()
   {
       return view('site.login');
   }

   public function postLogin(Request $request)
   {
       $validator = Validator::make($request->all(),[
           'phone' => 'required|numeric',
           'password' => 'required|min:6'
       ]);

       if($validator->passes()) {

           if (!Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
               $msg = "رقم الجوال أو كلمه المرور غير صحيحه.";
               return response()->json([
                   'key' => 'fail',
                   'msg' => $msg
               ]);
           }
           if(Auth::user()->is_Provider == 0)
           {
               $msg = route('main');

               return response()->json([
                   'key' => 'success',
                   'msg' => $msg
               ]);
           }
       }
       else {
           foreach ((array)$validator->errors() as $value) {
               if (isset($value['phone'])) {
                   $msg = 'رقم الجوال مطلوب';
                   return response()->json([
                       'key' => 'fail',
                       'msg' => $msg
                   ]);
               } elseif (isset($value['password'])) {
                   $msg = 'الرقم السري مطلوب';
                   return response()->json([
                       'key' => 'fail',
                       'msg' => $msg
                   ]);
               } else {
                   $msg = 'حدث خطأ ما';
                   return response()->json([
                       'key' => 'fail',
                       'msg' => $msg,
                   ]);
               }
           }
       }
   }

    public function main()
    {
        return view('site.main');
    }

    public function home()
    {
        return view('site.home');
    }

    public function contactUs()
    {
        return view('site.contactus');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
