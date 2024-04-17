@extends('admin/main')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Multi Images</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item active">All Multi Images</li>
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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($no = 1)
                                @foreach ($allMultiImage as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ asset($item->multi_image) }}" width="50"></td>
                                        <td>
                                            <a href="{{ route('edit.multi.image', $item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" title="Delete Data">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>

</div>

@endsection
