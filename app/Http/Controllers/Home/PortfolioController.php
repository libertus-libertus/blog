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
        return view('admin.portfolio.portfolio', compact('portfolio'));
    } // endMethod

    public function addPortfolioPage()
    {
        return view('admin.portfolio.add_portfolio');
    } // endMethod

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

        Image::make($image)->resize(1366, 768)->save('upload_images/frontend/portfolio/' . $nameGenerate);
        $saveUrl = 'upload_images/frontend/portfolio/' . $nameGenerate;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio has been inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('portfolio.page')->with($notification);
    } //

    public function editPortfolioPage($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit_portfolio', compact('portfolio'));
    } // endMethod

    // updateData
    public function updatePortfolioPage(Request $request)
    {
        // fieldsValidate
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

        $portfolioID = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $nameGenerate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1366, 768)->save('upload_images/frontend/portfolio/' . $nameGenerate);
            $saveUrl = 'upload_images/frontend/portfolio/' . $nameGenerate;

            Portfolio::findOrFail($portfolioID)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'Portfolio has been updated with image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('portfolio.page')->with($notification);
        } else {

            Portfolio::findOrFail($portfolioID)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            $notification = array(
                'message' => 'Portfolio has been updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('portfolio.page')->with($notification);
        }
    } // endMethod

    public function deletePortfolioPage($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $image = $portfolio->portfolio_image;
        unlink($image);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // endMethod

    public function detailsPortfolioPage($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details', compact('portfolio'));
    } // endMethod
}
