@extends('admin.dashboard')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Category</h5>
                <form action="{{ route('admin.category.update', $category->id) }}" class="row g-3" method="post" enctype="multipart/form-data">
                    @csrf @method('patch')

                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="col-md-6">
                        <label for="title" class="form-label">Category Name</label>
                        <input type="text" name="title" value="{{ $category->title }}" class="@error('title') is-invalid @enderror form-control" id="title"  >
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <label for="image" class="form-label">Category Image </label>
                        <input class="@error('image') is-invalid @enderror form-control" name="image" type="file" id="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <img id="showImage" src="{{ asset($category->image) }}" alt="Admin" class="rounded p-1 bg-primary" width="120">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
