<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPage() {
        $about = About::find(1);
        return view('admin.about.about', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $aboutID = $request->id;

        if($request->file('about_image')) {
            $image = $request->file('about_image');
            $nameGenerate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(5428, 3616)->save('upload_images/frontend/about/'.$nameGenerate); // cover normal size
            // Image::make($image)->resize(288, 288)->save('upload_images/frontend/'.$nameGenerate); // potrait size
            $saveUrl = 'upload_images/frontend/about/'.$nameGenerate;

            About::findOrFail($aboutID)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'About updated with image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {

            About::findOrFail($aboutID)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
