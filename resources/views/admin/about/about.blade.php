@extends('admin/main')
@section('content')

<!-- script javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit About</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item active">Edit About</li>
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

                        <form action="{{ route('update.about') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $about->id }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $about->title }}" id="title" name="title" placeholder="Title" required autofocus>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $about->short_title }}" id="short_title" name="short_title" placeholder="Short title" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3" placeholder="Short description" required>{{ $about->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="elm1" name="long_description" placeholder="Long description" required>{{ $about->long_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="about_image" name="about_image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <img class="card-img-top img-fluid" id="showAboutImage"
                                    src="{{ asset(!empty($about->about_image)) ? url($about->about_image) : url('upload_images/no_image.jpg') }}">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Update About" class="btn btn-info btn-sm btn-flat waves-effect waves-light">
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
        $('#about_image').change(function(e) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#showAboutImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
