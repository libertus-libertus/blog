@extends('admin/main')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.category.page') }}">Category</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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

                        <form action="{{ route('store.blog.category.page') }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <label for="blog_category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="blog_category" name="blog_category"
                                        placeholder="Category" autofocus>
                                    @error('blog_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Save Data"
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

@endsection