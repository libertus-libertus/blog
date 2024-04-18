<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function blogCategoryPage()
    {
        $blogCategory = BlogCategory::all();
        return view('admin.blog_category.blog_category', compact('blogCategory'));
    }

    public function addBlogCategoryPage()
    {
        return view('admin.blog_category.add_blog_category');
    }

    public function storeBlogCategoryPage(Request $request)
    {
        $request->validate(
            ['blog_category' => 'required'],
            ['blog_category.required' => 'Blog category is required']
        );

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Category has been inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category.page')->with($notification);
    }

    public function editBlogCategoryPage($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category', compact('blogCategory'));
    }

    public function updateBlogCategoryPage(Request $request)
    {
        $request->validate(
            ['blog_category' => 'required'],
            ['blog_category.required' => 'Blog category is required']
        );

        $blogCategoriID = $request->id;

        BlogCategory::findOrFail($blogCategoriID)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Category has been updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category.page')->with($notification);
    }

    public function deleteBlogCategoryPage($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
