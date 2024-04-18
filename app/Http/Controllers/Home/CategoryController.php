<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function categoryPage()
    {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    public function addCategoryPage()
    {
        return view('admin.category.add_category');
    }

    public function storeCategoryPage(Request $request)
    {
        $request->validate(
            ['category' => 'required'],
            ['category.required' => 'Category is required']
        );

        Category::insert([
            'category' => $request->category,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category has been inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.page')->with($notification);
    }

    public function editCategoryPage($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function updateCategoryPage(Request $request)
    {
        $request->validate(
            ['category' => 'required'],
            ['category.required' => 'Category is required']
        );

        $categoriID = $request->id;

        Category::findOrFail($categoriID)->update([
            'category' => $request->category,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.page')->with($notification);
    }

    public function deleteCategoryPage($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
