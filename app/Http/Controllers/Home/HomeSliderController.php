<?php

namespace App\Http\Controllers\Home;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeSlider = HomeSlide::find(1);
        return view('admin.slide.slides', compact('homeSlider'));
    }

    public function updateSlider(Request $request)
    {
        $slideID = $request->id;

        if($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $nameGenerate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(5428, 3616)->save('upload_images/frontend/'.$nameGenerate); // cover normal size
            // Image::make($image)->resize(288, 288)->save('upload_images/frontend/'.$nameGenerate); // potrait size
            $saveUrl = 'upload_images/frontend/'.$nameGenerate;

            HomeSlide::findOrFail($slideID)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'Home slide updated with image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {

            HomeSlide::findOrFail($slideID)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home slide updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
