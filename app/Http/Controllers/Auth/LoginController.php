<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use View;
use Auth;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	protected $maxAttempts = 5;

	protected $decayMinutes = 2;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
		$cat = Category::where('parent_id', 0)->get();
		View::share('categories', $cat);
	}

	public function username()
	{
		return 'username';
	}


	/*protected function credentials(Request $request)
	{
		$field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
			? $this->username()
			: 'username';

		return [
			$field     => $request->get($this->username()),
			'password' => $request->password,
		];
	}*/

	public function redirectTo()
	{
		$role = Auth::user()->role;
		if ($role == 'admin')
		{
			return 'admin';
		}
		else
		{
			return '/';
		}
	}
}
