@extends('instructor.dashboard')

@section('instructor')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('instructor.course.create') }}" class="btn btn-primary px-5">Add Course</a>
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
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $key => $course)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img style="width: 100px" src="{{ asset($course->image) }}"></td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->category->title }}</td>
                                <td>{{ $course->selling_price}}</td>
                                <td>{{ $course->discount_price}}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-4">
                                        <a href="{{ route('instructor.course.edit', $course->id) }}"><i
                                                class="bx bxs-pencil text-success"></i></a>
                                        <a href="{{ route('instructor.course.delete', $course->id) }}" id="delete"><i
                                                class="bx bxs-trash text-danger"></i></a>
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
