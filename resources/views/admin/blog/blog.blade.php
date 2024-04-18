@extends('admin/main')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
                            </li>
                            <li class="breadcrumb-item active">Blog</li>
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
                        <a href="{{ route('add.blog.page') }}" class="btn btn-primary btn-sm" title="Add Data">
                            <i class="fas fa-plus"></i>
                            Add Blog
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th class="text-center">Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($no = 1)
                                @foreach ($blog as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['category']['category'] }}</td>
                                    <td>{{ $item->blog_title }}</td>
                                    <td>{{ $item->blog_tags }}</td>
                                    <td class="text-center"><img src="{{ asset($item->blog_image) }}" width="50"></td>
                                    <td>
                                        <a href="{{ route('edit.blog.page', $item->id) }}"
                                            class="btn btn-info btn-sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('delete.blog.page', $item->id) }}"
                                            class="btn btn-danger btn-sm" title="Delete Data" id="delete">
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
