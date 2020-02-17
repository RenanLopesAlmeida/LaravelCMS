<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $data = $request->only([
            'email',
            'password'
        ]);

        $validator = $this->validator($data);
        $remember = $request->input('remember', false);

        if($validator->fails()) {
            $this->redirectWithErrors($validator, 'login');
        }

        if(Auth::attempt($data, $remember)) {
            return redirect()->route('admin');
        } else {
            $validator->errors()->add('password', 'E-mail e/ou senha incorreto(s)');
            $this->redirectWithErrors($validator, 'login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    private function redirectWithErrors($validator, $routeName) {
        return redirect()->route($routeName)
        ->withErrors($validator)
        ->withInput();
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:100' ],
            'password' => ['required', 'string', 'max:4']
        ]);
    }
}
