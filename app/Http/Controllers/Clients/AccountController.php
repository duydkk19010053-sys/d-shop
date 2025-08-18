<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = ShippingAddress::where('user_id', Auth::id())->get();
        return view('clients.pages.account', compact('user', 'addresses'));
    }
    //Update account i4
    public function update(Request $request)
    {
        $request->validate([
            'ltn__name' => 'required|string|min:3|max:255',
            'ltn__phone_number' => 'nullable|string|max:15',
            'ltn__address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        //handle avatar
        if($request->hasFile('avatar')){
            //delete old photo if exists
            if($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $file = $request->file('avatar');
            // Create new name with timestamp
            $filename = time() . '_' . $file->getClientOriginalExtension();
            // Save img to folder
            $avatarPath = $file->storeAs('uploads/users', $filename, 'public');
            $user->avatar = $avatarPath;
        }

        $user->name = $request->input('ltn__name');
        $user->phone_number = $request->input('ltn__phone_number');
        $user->address = $request->input('ltn__address');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thông tin thành công',
            'avatar' => asset('storage/' . $user->avatar)
        ]);
    }

    //Change password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
            'confirm_new_password' => 'required|same:new_password'
        ],[
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Mật khẩu mới là bắt buộc.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'confirm_new_password.required' => 'Xác nhận mật khẩu mới là bắt buộc.',
            'confirm_new_password.same' => 'Xác nhận mật khẩu mới không khớp.'
        ]);

        $user = Auth::user();

        // Check if current password incorrect
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => ['current_password' => ['Mật khẩu hiện tại không chính xác.']]], 422);
        }

        // Update password
        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'success' => true,
            'message' => 'Thay đổi mật khẩu thành công.'
        ]);
    }

    // address add new
    public function addAddress(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100', 

        ]);

        // if the new address is set default, update default address= 0
        if($request->has('default')) {
            ShippingAddress::where('user_id', Auth::id())->update(['default' => 0]);
        }

        ShippingAddress::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'default' => $request->has('default') ? 1 : 0
        ]);

        return back()->with('success', 'Thêm địa chỉ thành công.');
    }


    // update primary address
    public function updatePrimaryAddress($id)
    {
        // Find address
        $address = ShippingAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Set all address this user default = 0
        ShippingAddress::where('user_id', Auth::id())->update(['default' => 0]);

        // Update address selected => default = 1
        $address->update(['default' => 1]);
        return back()->with('success', 'Đặt địa chỉ này làm mặc định thành công.');
    }


    // delete address
    public function deleteAddress($id)
    {
        ShippingAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail()->delete();
        return back()->with('success', 'Xóa địa chỉ thành công.');
    }
}
