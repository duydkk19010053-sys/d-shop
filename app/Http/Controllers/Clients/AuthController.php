<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Mail\ActivationMail;
use App\Models\User;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Str;



class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('clients.pages.register');
    }

    public function register(Request $request)
    {
        // vailidate backend
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],[
            'name.required' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        // Check if email exists
        $existingUser = User::where('email', $request->email)->first();

        if($existingUser)
        {
            if($existingUser->isPending())
            {   
                
                // toastr()->error('Email đã được đăng ký và đang đợi kích hoạt');
                return redirect()->route('register')->with('error', 'Email đã được đăng ký và đang đợi kích hoạt');
            }
            return redirect()->route('register');
        }
        //Creat token active'
        $token = Str::random(64);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'pending',
            'role_id' => 3,
            'activation_token' => $token,
        ]);

        Mail::to($user->email)->send(new ActivationMail($token, $user));


        // toastr()->success('Đăng kí tài khoản thành công.Vui lòng kiểm tra email của bạn');
        return redirect()->route('login')->with('success', 'Đăng kí tài khoản thành công.Vui lòng kiểm tra email của bạn');
    } 
    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if($user)
        {
            $user->status = 'active';
            $user->activation_token = null;
            $user->save();

            Toastr()->success('Kích hoạt tài khoản thành công');
            return redirect()->route('login')->with('success', 'Kích hoạt tài khoản thành công');
        }

        // toastr()->error('Token không hợp lệ hoặc đã hết hạn');
        return redirect()->back()->with('error', 'Token không hợp lệ hoặc đã hết hạn');
    }


    //login

    public function showLoginForm() {
        return view('clients.pages.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        //check login i4 
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active']))
        {
            if(in_array(Auth::user()->role->name,['customer']))
            {
                $request->session()->regenerate();
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            } else {
                Auth::logout();
                return redirect()->back()->with('warning', 'Bạn không có quyền truy cập tài khoản này');
            }
        }

        return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác hoặc chưa được kích hoạt');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }
}


