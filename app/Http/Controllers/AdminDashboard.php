<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AdminDashboard extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function AdminProfileUpdate(Request $request)
    {

        $request->validate([
            'email' => 'email',
            'phone' => 'min:11|max:15',
        ]);

        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);

        $username = $request->username;
        $username_lower = Str::lower($username);
        $username_remove_space = Str::replace(' ', '', $username_lower);

        User::find($id)->update([
            'username' => $username_remove_space,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($request->hasFile('photo')) {
            if ($profileData->photo) {
                unlink(base_path('public/upload/admin_images/' . $profileData->photo));
            }
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            $img->save(base_path('public/upload/admin_images/' . $file_name));
            User::find($id)->update([
                'photo' => $file_name,
            ]);
        }

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {

            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error',
            );

            return back()->with($notification);
        } else {
            if ($request->old_password === $request->new_password) {
                $notification = array(
                    'message' => 'Old password and new password same!',
                    'alert-type' => 'error',
                );

                return back()->with($notification);
            } else {
                User::find($id)->update([
                    'password' => Hash::make($request->new_password),
                ]);

                $notification = array(
                    'message' => 'Password Changed Successfully',
                    'alert-type' => 'success',
                );

                return back()->with($notification);
            }
        }
    }
}
