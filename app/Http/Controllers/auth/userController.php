<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    public function index(){
        return view('client.pages.auth.login');
    }

    public function Login(Request $request){
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Không để trống email',
                'password.required' => 'Không để trống Mật khẩu',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến trang sau khi đăng nhập thành công
            toastr()->success('Đăng nhập thành công','Thành công');
            return redirect()->route('home');
        } else {
            // Đăng nhập thất bại, chuyển hướng đến trang đăng nhập với thông báo lỗi
            return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function register(){

        return view('client.pages.auth.register');
    }

    public function handleUser(Request $request){
       $request->validate(
           [
               'username' => 'required',
               'email' => 'required|unique:users,email',
               'password' => 'required|min:6|same:password_confirmation',
               'password_confirmation' => 'min:6|required'
           ],
           [
               'username.required' => 'Không để trống tên',
               'email.required' => 'Không để trống email',
               'email.unique' => 'Email này đã tồn tại',
               'password.required' => 'Không để trống Mật khẩu',
               'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
               'password.same' => 'Mật khẩu nhập lại không khớp',
               'password_confirmation.required' => 'Không để trống nhập lại mật khẩu',
               'password_confirmation.min' => 'Mật khẩu tối thiểu 6 ký tự',
           ]
       );
        DB::table('users')->insert(
            [
                'name' => $request->username,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'role_id' => 1
            ]
        );
        toastr()->success('Đăng kí thành công','Thành công');
        return redirect()->route('auth.registerUser')->with('toast', ['message' => 'Đăng kí thành công','status' => 200]);
    }

    public function profile(){
        return view('client.pages.user.profile');
    }

    public function info(){

        return view('client.pages.user.info');
    }

    public function updateInfo(){

    }

    public function logout(){
        Auth::logout();
        toastr()->error('Đã Đăng Xuất','Thành công');
        return redirect()->route('auth.login')->with('toast', ['message' => 'Đã Đăng Xuất','status' => 400]);
    }
}
