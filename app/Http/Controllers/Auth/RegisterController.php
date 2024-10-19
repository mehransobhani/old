<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Classes\SMS\SmsCode;
use App\Classes\Fa2En\Fa2En;
use App\ConfirmNumber;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use View;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
		$cat = Category::where('parent_id', 0)->get();
		View::share('categories', $cat);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|string|check_username|max:255|unique_username',
			'password' => 'required|string|min:6',
			/*'captcha'  => 'required|captcha'*/
		], [], [
			'username' => 'شماره همراه  ',
			'password' => 'کلمه عبور',
			'captcha'  => 'کد امنیتی'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $data
	 *
	 * @return \App\User
	 */
    protected function submitCode(Request $request)
    {

        $Validator = Validator::make($request->all(),
            [
                'phone' => 'required|string|check_username|max:255',
            ]
            , ['password'=>'  فرمت رمز عبور نا معتبر است'], [
                'phone' => 'شماره همراه  ',
            ]);
        if($Validator->fails())
        {
            return back()->with("error","شماره همراه نا معتبر است")->withInput();
        }
        $phone=Fa2En::convert($request->get("phone"));

        if(!$phone)
            return back()->with("error","پر کردن شماره موبایل الزامیست");

        $users=User::where("username",$phone)->first();
        if($users)
            return back()->with("error","کاربر محترم شما قبلا با این شماره ثبت نام کرده اید .");


        $confirm=ConfirmNumber::where("phone",$phone)->where("expire_at",">=",time())->first();
        if($confirm)
        {
            // return back()->with("error","امکان ارسال مجدد کد تا 2 دقیقه وجود ندارد");
            $limit=$confirm->expire_at-time();
 
            return view("auth.newRegister",compact("phone","limit"));
        }

        ConfirmNumber::where("phone",$phone)->update(["status"=>0]);

        $code=rand(10000,99999);
        ConfirmNumber::create(["code"=>$code , "phone"=>$phone,"expire_at"=>(time()+(120)) ,"status"=>1]);
        $sms=SmsCode::send($code,"register",$phone);
          if($sms && $sms->return && $sms->return->status==200)
            return view("auth.newRegister",compact("phone"));
        else
            return back()->with("error","خطایی رخ داد");

    }


    protected function final(Request $request)
    {
        $phone=Fa2En::convert($request->get("phone"));
        $code=Fa2En::convert($request->get("code"));

    $confirm=ConfirmNumber::where("phone",$phone)->where("status",2)->first();
        if($confirm)
        {
            return view("auth.finalRegister",compact("phone"));
        }
        
        $confirm=ConfirmNumber::where("phone",$phone)->where("status",1)->where("code",$code)->where("expire_at",">=",time())->first();

        if(!$confirm)
        {
            return back()->with("error","کد تایید نا معتبر است");
        }
        $confirm->status=2;
        $confirm->save();

        return view("auth.finalRegister",compact("phone"));
    }

	protected function create(array $data)
	{
		return User::create([
			'username' => $data['username'],
			'password' => bcrypt($data['password']),
			'role'     => 'user'
		]);
	}
}
