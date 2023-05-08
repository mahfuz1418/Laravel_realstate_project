<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function AdminProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);

        User::find($id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($request->hasFile('photo')) {
            unlink(base_path('public/upload/admin_images/'.$profileData->photo));
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            $img->save(base_path('public/upload/admin_images/'.$file_name));
            User::find($id)->update([
                'photo' => $file_name,
            ]);
        }

        return redirect()->back();
    }
}
