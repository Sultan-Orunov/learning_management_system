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
                <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" class="row g-3" method="post" enctype="multipart/form-data">
                    @csrf @method('patch')

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select mb-3" name="category_id" aria-label="category">
                            <option value="{{ null }}" selected="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? ' selected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <label for="title" class="form-label">Sub Category Name</label>
                        <input type="text" name="title" value="{{ $subcategory->title }}" class="@error('title') is-invalid @enderror form-control" id="title"  >
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Edit Sub Category</button>
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
