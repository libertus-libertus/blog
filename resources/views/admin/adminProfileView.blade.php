@extends('admin/main')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile Setting</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item active">Profile Setting</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="m-auto p-3">
                        <img class="card-img-top img-fluid" src="{{ asset(!empty($adminData->profileimage)) ? url('upload_images/backend/'.$adminData->profileimage) : url('upload_images/no_image.jpg') }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><em><strong>{{ $adminData->name }}</strong></em></h4>

                        <span class="card-text">
                            <small class="text-muted">Your e-Mail: {{ $adminData->email }}</small>
                        </span> <br>
                        <span class="card-text">
                            <small class="text-muted">Username: {{ $adminData->username }}</small>
                        </span>
                        <hr>
                        <a href="{{ route('edit.profile') }}" type="button" class="btn btn-info btn-sm btn-flat waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>

            </div>

        </div><!-- end row -->
    </div>

</div>

@endsection
