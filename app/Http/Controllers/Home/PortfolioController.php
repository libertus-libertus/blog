<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Image;

class PortfolioController extends Controller
{
    public function portfolioPage()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_view', compact('portfolio'));
    } // endMethod

    public function addPortfolioPage()
    {
        return view('admin.portfolio.add_portfolio');
    } // endMethod

    // simpanDataPortfolio
    public function storePortfolioPage(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required',
        ], [
            'portfolio_name.required' => 'Sorry! Name is required',
            'portfolio_title.required' => 'Sorry! Title is required',
            'portfolio_description.required' => 'Sorry! Description is required',
            'portfolio_image.required' => 'Sorry! Image is required',
        ]);

        $image = $request->file('portfolio_image');
        $nameGenerate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(5428, 3616)->save('upload_images/frontend/portfolio/' . $nameGenerate);
        $saveUrl = 'upload_images/frontend/portfolio/' . $nameGenerate;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Nice! Your portfolio has been inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('portfolio.page')->with($notification);
    } // endMethod
}
