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
                    <li class="breadcrumb-item active" aria-current="page">Instructors</li>
                </ol>
            </nav>
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
                            <th>Instructor Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($instructors as $key => $instructor)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $instructor->name }}</td>
                        <td>{{ $instructor->username }}</td>
                        <td>{{ $instructor->email }}</td>
                        <td>{{ $instructor->phone }}</td>
                        <td>
                            @if($instructor->status == 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">InActive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-4">
                                <a href="{{ route('admin.subcategory.edit', $instructor->id) }}"><i class="bx bxs-pencil text-success"></i></a>
                                <a href="{{ route('admin.subcategory.delete', $instructor->id) }}" id="delete"><i class="bx bxs-trash text-danger"></i></a>
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
