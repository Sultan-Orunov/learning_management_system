@extends('instructor.dashboard')

@section('instructor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Add Course</h5>
                <form action="" class="row g-3" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-6">
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control" id="name"  >
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" id="title"  >
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-7">
                        <label for="image" class="form-label">Course Image</label>
                        <input class="@error('image') is-invalid @enderror form-control" name="image" type="file" id="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-5">
                        <img id="showImage" src="{{ url('upload/no_image.jpg')}}" alt="Admin" class="rounded p-1 bg-primary" width="120">
                    </div>

                    <div class="col-md-7">
                        <label for="video" class="form-label">Course intro Video</label>
                        <input class="@error('video') is-invalid @enderror form-control" name="video" type="file" accept="video/mp4, video/webm">
                        @error('video') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select mb-3" name="category_id" aria-label="category">
                            <option selected="" disabled>Open this select menu</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="subcategory_id" class="form-label">SubCategory</label>
                        <select class="form-select mb-3" name="subcategory_id" aria-label="subcategory_id">
                            <option></option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="certificate" class="form-label">Certificate Available</label>
                        <select class="form-select mb-3" name="certificate" aria-label="certificate">
                            <option selected="" disabled>Open this select menu</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        @error('certificate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="label" class="form-label">Label</label>
                        <select class="form-select mb-3" name="label" aria-label="label">
                            <option selected="" disabled>Open this select menu</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Middle">Middle</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                        @error('label') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="selling_price" class="form-label">Course Price</label>
                        <input type="text" name="selling_price" value="{{ old('selling_price') }}" class="@error('selling_price') is-invalid @enderror form-control" id="selling_price"  >
                        @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="discount_price" class="form-label">Discount Price</label>
                        <input type="text" name="discount_price" value="{{ old('discount_price') }}" class="@error('discount_price') is-invalid @enderror form-control" id="discount_price"  >
                        @error('discount_price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" value="{{ old('duration') }}" class="@error('duration') is-invalid @enderror form-control" id="duration"  >
                        @error('duration') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3 mb-2">
                        <label for="resources" class="form-label">Resources</label>
                        <input type="text" name="resources" value="{{ old('resources') }}" class="@error('resources') is-invalid @enderror form-control" id="resources"  >
                        @error('resources') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <hr>
                    <div class="col-md-4">
                        <input type="checkbox" name="bestseller" class="form-check-input" id="bestseller" value="1" {{ old('bestseller') == 1 ? 'checked' : '' }}>
                        <label for="resources" class="form-check-label">Bestseller</label>
                    </div>

                    <div class="col-md-4">
                        <input type="checkbox" name="featured" class="form-check-input" id="featured" value="1" {{ old('featured') == 1 ? 'checked' : '' }}>
                        <label for="resources" class="form-check-label">Featured</label>
                    </div>

                    <div class="col-md-4">
                        <input type="checkbox" name="highestrated" class="form-check-input" id="highestrated" value="1" {{ old('highestrated') == 1 ? 'checked' : '' }}>
                        <label for="highestrated" class="form-check-label">Highest Rated</label>
                    </div>
                    <hr>

                    <div class="col-md-12">
                        <label for="prerequisites" class="form-label">Course Prerequisites</label>
                        <textarea name="prerequisites" class="@error('prerequisites') is-invalid @enderror form-control" id="prerequisites" rows="3" placeholder="Course Prerequisites...">
                            {{ old('prerequisites') }}
                        </textarea>
                        @error('prerequisites') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Course Description</label>
                        <textarea name="description" class="@error('description') is-invalid @enderror form-control" id="myeditorinstance">
                            {{ old('description') }}
                        </textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
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
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/instructor/courses/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.title + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });

    </script>


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
