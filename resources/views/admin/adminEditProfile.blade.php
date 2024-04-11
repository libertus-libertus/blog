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
                    <h4 class="mb-sm-0">Edit Data</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">PT. Mattaoi Bumi Sikerei</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.profile') }}">Profile Setting</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
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

                        <h4 class="card-title">Edit Data</h4>

                        <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->name }}" id="name" name="name" placeholder="Name" required autofocus autocomplete="off">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $editData->email }}" id="email" name="email" placeholder="E-Mail" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->username }}" id="username" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="profileImage" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="profileImage" name="profileImage">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <img class="card-img-top img-fluid" id="showImageProfile" src="{{ asset(!empty($editData->profileimage)) ? url('backend/images/'.$editData->profileimage) : url('backend/no_image.jpg') }}" alt="no image">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Update Profile" class="btn btn-info btn-sm btn-flat waves-effect waves-light">
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
        $('#profileImage').change(function(e) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#showImageProfile').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
