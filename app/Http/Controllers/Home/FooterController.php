<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function footerPage() {
        $footer = Footer::find(1);
        return view('admin.footer.footer', compact('footer'));
    }

    public function updateFooterPage(Request $request) {
        $request->validate([
            'number' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'copyright' => 'required',
        ],
        [
            'number.required' => 'Phone number is required',
            'description.required' => 'Description is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'copyright.required' => 'Copyright is required',
        ]);

        $footerID = $request->id;

        Footer::findOrFail($footerID)->update([
            'number' => $request->number,
            'description' => $request->description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'linkedin' => $request->linkedin,
            'copyright' => $request->copyright,
        ]);

        $notification = array(
            'message' => 'Footer has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('footer.page')->with($notification);
    }
}
