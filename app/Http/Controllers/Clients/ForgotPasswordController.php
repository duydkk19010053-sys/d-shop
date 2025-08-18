<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('clients.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Email là bắt buộc',
                'email.email' => 'Email không hợp lệ.',
                'email.exists' => 'Email không tồn tại'
            ]
            );

            $status = Password::sendResetLink($request->only('email'));

            if($status === Password::RESET_LINK_SENT)
            {
                return back()->with('success', 'Liên kết đặt đã gửi đến Email của bạn');
            }
            return back()->withErrors(['email' => __($status)])->with('error', 'Có lỗi xảy ra vui lòng thử lại sau');
    }
}
