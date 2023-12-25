@extends('admin.dashboard')

@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary px-5">Add Category</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Image</th>
                            <th>Category Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img style="width: 100px" src="{{ asset($category->image) }}"></td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-4">
                                <a href="{{ route('admin.category.edit', $category->id) }}"><i class="bx bxs-pencil text-success"></i></a>
                                <a href=""><i class="bx bxs-trash text-danger"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection
