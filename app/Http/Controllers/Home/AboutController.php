<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $about = About::find(1);
        return view('admin.about.about', compact('about'));
    } // endMethod

    public function updateAbout(Request $request)
    {
        $aboutID = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $nameGenerate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(5428, 3616)->save('upload_images/frontend/about/' . $nameGenerate);
            $saveUrl = 'upload_images/frontend/about/' . $nameGenerate;

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
        } // endElse
    } // endMethod

    //
    public function homeAbout()
    {
        $about = About::find(1);
        return view('frontend.about', compact('about'));
    } // endMethod

    public function aboutMultiImage()
    {
        $about = About::find(1);
        return view('admin.about.multi_image', compact('about'));
    } // endMethod

    public function storeMultiImage(Request $request)
    {
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $nameGenerate = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(100, 100)->save('upload_images/frontend/about/' . $nameGenerate);
            $saveUrl = 'upload_images/frontend/about/' . $nameGenerate;

            MultiImage::insert([
                'multi_image' => $saveUrl,
                'created_at' => Carbon::now(),
            ]);
        }  // end Of the Foreach

        $notification = array(
            'message' => 'Multi image inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // endMethod

    public function allMultiImage() {
        $allMultiImage = MultiImage::all();
        return view('admin.about.all_multi_images', compact('allMultiImage'));
    } // endMethod
}
