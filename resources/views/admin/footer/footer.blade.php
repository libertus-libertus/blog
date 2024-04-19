@extends('admin/main')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Footer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">PT. Mattaoi Bumi Sikerei</a></li>
                            <li class="breadcrumb-item active">Footer</li>
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

                        <form action="{{ route('update.footer.page') }}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{ $footer->id }}">

                            <div class="row mb-3">
                                <label for="number" class="col-sm-2 col-form-label">Phone number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->number }}" id="number" name="number" placeholder="Phone number" autofocus>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" rows="6">{{ $footer->description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->address }}" id="address" name="address" placeholder="Address">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $footer->email }}" id="email" name="email" placeholder="E-mail">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook profile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->facebook }}" id="facebook" name="facebook" placeholder="Facebook">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="instagram" class="col-sm-2 col-form-label">Instagram profile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->instagram }}" id="instagram" name="instagram" placeholder="Instagram">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="tiktok" class="col-sm-2 col-form-label">Tiktok profile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->tiktok }}" id="tiktok" name="tiktok" placeholder="Tiktok">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="linkedin" class="col-sm-2 col-form-label">Linkedin profile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->linkedin }}" id="linkedin" name="linkedin" placeholder="Linkedin">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $footer->copyright }}" id="copyright" name="copyright" placeholder="Copyright">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Update Footer" class="btn btn-info btn-sm btn-flat waves-effect waves-light">
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
