@extends('admin/main')
@section('content')

<!-- script javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- script css -->
<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Blog</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.page') }}">Blog</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('update.blog.page') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $blog->id }}">

                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select id="category_id" name="category_id" class="form-select"
                                        aria-label="Default select example">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $blog->category_id ? 'selected' : '' }}>{{ $item->category }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="blog_title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="blog_title" name="blog_title" value="{{ $blog->blog_title }}"
                                        placeholder="Title">
                                    @error('blog_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="blog_tags" class="col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="blog_tags" name="blog_tags" value="{{ $blog->blog_tags }}" data-role="tagsinput">
                                    @error('blog_tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="blog_description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="elm1" name="blog_description"
                                        placeholder="Description">{{ $blog->blog_description }}"</textarea>
                                    @error('blog_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="blog_image" name="blog_image">
                                    @error('blog_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-1">
                                    <img class="card-img-top img-fluid" id="showBlogImage"
                                        src="{{ asset($blog->blog_image) }}" width="100">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Update Data"
                                        class="btn btn-info btn-sm btn-flat waves-effect waves-light">
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div><!-- end row -->
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#blog_image').change(function(e) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#showBlogImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
