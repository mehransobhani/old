<?php

namespace App\Http\Controllers;

use App\Category;
use App\Classes\Fa2En\Fa2En;
use App\Classes\SMS\ResetPasswordMessage;
use App\Classes\SMS\SmsCode;
use App\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Session;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $cat = Category::where('parent_id', 0)->get();
        view()->share('categories', $cat);
    }
    public function view()
    {
        return \view("auth.reset");
    }
    public function newPasswordView($id)
    {
        return \view("auth.newPassword" ,compact("id"));
    }
    public function submitCodeView($id)
    {
        $user=User::find($id);
        $userName=Fa2En::convert($user->username);
        return \view("auth.resetCode" ,compact("id","userName"));
    }
    public function submitCode(Request $request)
    {
        $code=Fa2En::convert($request->code);
        $userId=$request->id;
        $reset=ResetPassword::where("expire",">",time())->where("user_id",$userId)->where("code",$code)->where("status",1)->first();
        if(!$reset)
        {
            return redirect()->back()->with('error', "کد بازیابی نا معتبر است !");
        }
        $reset->status=2;
        $reset->save();

        return Redirect::to(route("newPasswordView",$userId));
    }
    public function sendCode(Request $request)
    {
        $username=$request->username;
        $user=User::where("username",$username)->first();
         if(!$user)
        {
            return redirect()->back()->with('error', "کاربر یافت نشد !");
        }

        $reset=ResetPassword::where("expire",">",time())->where("user_id",$user->id)->where("status",1)->first();
        $code=rand(10000,99999);
        if($reset)
        {
            return back()->with("error","امکان ارسال مجدد کد تا 2 دقیقه وجود ندارد");

        }
        if(!$reset) {
            ResetPassword::create([
                "code" => $code,
                "user_id" => $user->id,
                "username" => $username,
                "expire" => time() + (120),
                "status"=>1
            ]); 
            SmsCode::send($code,"reset", $username);
         }
        return Redirect::to(route("submit-code-view",$user->id));
    }

    public function reset(Request $request)
    {

        $Validator= Validator::make($request->all(), [
            'newPassword' => 'required|string|min:6',
        ], [], [
            'newPassword' => 'کلمه عبور  ',
        ]);

        if($Validator->fails())
        {
            return back()->with("error","کلمه عبور  نا معتبر است")->withInput();
        }
        $password=$request->newPassword;
        $userId=$request->id;
        $reset=ResetPassword::where("expire",">",time())->where("user_id",$userId)->where("status",2)->first();
        if(!$reset)
        {
            return redirect()->back()->with('error', "تایید کد پیامکی الزامیست !");
        }
        $user=User::find($userId);
        $user->password=bcrypt($password);
        $user->save();
        return Redirect::to(route("login"))->with("changePassword","کلمه عبور شما با موفقیت تغییر کرد .");
    }
}
