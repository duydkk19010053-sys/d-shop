<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('admin')->user();
            // Check if the user is an admin
            if (in_array($user->role->name, ['admin', 'staff'])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập admin thành công!');
            }

            Auth::guard('admin')->logout();
            return back()->with('error', 'Bạn không có quyền truy cập!');
        }

        return back()->with('error', 'Email hoặc mật khẩu không đúng!');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công!');
    }
}
