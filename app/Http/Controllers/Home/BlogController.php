<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use App\Models\Category;
use Image;

class BlogController extends Controller
{
    public function blogPage()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.blog', compact('blog'));
    }

    public function addBlogPage()
    {
        // ambil data category di table category
        $category = Category::orderBy('category', 'ASC')->get();
        return view('admin.blog.add_blog', compact('category'));
    }

    public function storeBlogPage(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ], [
            'category_id.required' => 'Sorry! Category is required',
            'blog_title.required' => 'Sorry! Title is required',
            'blog_tags.required' => 'Sorry! Tags is required',
            'blog_description.required' => 'Sorry! Description is required',
            'blog_image.required' => 'Sorry! Image is required',
        ]);

        $image = $request->file('blog_image');
        $nameGenerate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(430, 327)->save('upload_images/frontend/blog/' . $nameGenerate);
        $saveUrl = 'upload_images/frontend/blog/' . $nameGenerate;

        Blog::insert([
            'category_id' => $request->category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog has been inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.page')->with($notification);
    }

    public function editBlogPage($id)
    {
        $blog = Blog::findOrFail($id);
        $category = Category::orderBy('category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('blog', 'category'));
    }

    public function updateBlogPage(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
        ], [
            'category_id.required' => 'Sorry! Category is required',
            'blog_title.required' => 'Sorry! Title is required',
            'blog_tags.required' => 'Sorry! Tags is required',
            'blog_description.required' => 'Sorry! Description is required',
        ]);

        $blogID = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $nameGenerate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(430, 327)->save('upload_images/frontend/blog/' . $nameGenerate);
            $saveUrl = 'upload_images/frontend/blog/' . $nameGenerate;

            Blog::findOrFail($blogID)->update([
                'category_id' => $request->category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $saveUrl,
            ]);

            $notification = array(
                'message' => 'Blog has been updated with image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.page')->with($notification);
        } else {

            Blog::findOrFail($blogID)->update([
                'category_id' => $request->category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);

            $notification = array(
                'message' => 'Blog has been updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.page')->with($notification);
        }
    }

    public function deleteBlogPage($id) {
        $blog = Blog::findOrFail($id);
        $image = $blog->blog_image;
        unlink($image);

        blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog has been deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
