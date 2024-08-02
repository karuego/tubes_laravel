<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => ['required', 'email'],
			'password' => ['required', 'string'],
		], [
			'email.required' => 'Email harus diisi.',
			'email.email' => 'Format email tidak valid.',
			'password.required' => 'Password harus diisi.',
		]);
	}

	public function showLoginForm()
	{
		// if (auth()->check())
			// return redirect()->route('index')->with('success-index', 'Login berhasil');

		return view('auth.login');
	}

	public function login(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$credentials = $request->only('email', 'password');

		if (!Auth::attempt($credentials)) {
			return redirect()->back()->withErrors([
				'email' => 'Email atau password salah.',
			])->withInput();
		}

		$request->session()->regenerate();

		$msg = null;
		if (auth()->user()->is_admin) {
			$msg = 'Anda login sebagai admin!';
			$msg = [
				'success-index' => 'Anda login sebagai admin!',
				'alert' => 'alert-warning',
			];
		} else {
			$msg = [
				'success-index' => 'Anda telah login!',
			];
		}

		return redirect()->route('home')->with($msg);
	}

	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('home')
			->with([
				'success-index' =>'Anda telah logout!',
				'alert' => 'alert-danger',
			]);
	}
}
