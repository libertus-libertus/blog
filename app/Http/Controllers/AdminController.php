<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    // Route logout admin
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminProfileView', compact('adminData'));
    }

    public function editProfile() {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.adminEditProfile', compact('editData'));
    }

    public function storeProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profileImage')) {
            $file = $request->file('profileImage');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/images'), $filename);
            $data['profileImage'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
}
