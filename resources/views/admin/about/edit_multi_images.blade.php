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
                    <h4 class="mb-sm-0">Edit Multi Image</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all.multi.image') }}">All Multi Image</a></li>
                            <li class="breadcrumb-item active">Edit Multi Image</li>
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

                        <form action="{{ route('update.multi.image') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $editMultiImage->id }}">

                            <div class="row mb-3">
                                <label for="multi_image" class="col-sm-2 col-form-label">EDit Multi Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="multi_image" name="multi_image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-1">
                                    <img class="card-img-top img-fluid" id="showMultiImage"
                                    src="{{ asset($editMultiImage->multi_image) }}" width="100">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Update Multi Image" class="btn btn-info btn-sm btn-flat waves-effect waves-light">
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
        $('#multi_image').change(function(e) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#showMultiImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
