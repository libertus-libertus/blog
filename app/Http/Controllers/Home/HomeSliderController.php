<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function homeSlider()
    {
        $homeSlider = HomeSlide::find(1);
        return view('admin.slide.slides', compact('homeSlider'));
    }
}
