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
                            <form action="{{ route('admin.instructors.update', $instructor->id) }}" method="post">
                                @csrf @method('patch')
                                @if($instructor->status == 1)
                                    <button class="btn btn-success" type="submit">Active</button>
                                @else
                                    <button class="btn btn-danger" type="submit">InActive</button>
                                @endif
                            </form>
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
