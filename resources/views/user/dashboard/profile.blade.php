@extends('user.dashboard.dashboard')
@section('content')
    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
        <div class="media media-card align-items-center">
            <div class="media-img media--img media-img-md rounded-full">
                <img class="rounded-full" src="{{ $user->photo ? asset('upload/user_images/'. $user->photo) : asset('upload/no_image.jpg') }}" alt="Student thumbnail image">
            </div>
            <div class="media-body">
                <h2 class="section__title fs-30">Hello, {{ ucfirst($user->name) }}</h2>
                <div class="rating-wrap d-flex align-items-center pt-2">
                </div><!-- end rating-wrap -->
            </div><!-- end media-body -->
        </div><!-- end media -->
    </div><!-- end breadcrumb-content -->

    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">Edit Profile</h3>
                <form action="{{ route('profile.update', $user->id) }}" method="post" class="row pt-40px" enctype="multipart/form-data">
                    @csrf @method('patch')

                    <div class="media media-card align-items-center">
                        <div class="media-img media-img-lg mr-4 bg-gray">
                            <img class="mr-3" src="{{ $user->photo ? asset('upload/user_images/'. $user->photo) : asset('upload/no_image.jpg') }}" alt="avatar image">
                        </div>
                        <div class="media-body">
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="photo" class="@error('photo') is-invalid @enderror multi file-upload-input with-preview" multiple>
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                            </div><!-- file-upload-wrap -->
                            @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                            <p class="fs-14">Max file size is 5MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png</p>
                        </div>
                    </div><!-- end media -->

                    <div class="input-box col-lg-6">
                        <label class="label-text">Name</label>
                        <div class="form-group">
                            <input class="@error('name') is-invalid @enderror form-control form--control" type="text" name="name" value="{{ $user->name }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">User Name</label>
                        <div class="form-group">
                            <input class="@error('username') is-invalid @enderror form-control form--control" type="text" name="username" value="{{ $user->username }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">Email Address</label>
                        <div class="form-group">
                            <input class="@error('email') is-invalid @enderror form-control form--control" type="email" name="email" value="{{ $user->email }}">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">Phone Number</label>
                        <div class="form-group">
                            <input class="@error('phone') is-invalid @enderror form-control form--control" type="text" name="phone" value="{{ $user->phone }}">
                            <span class="la la-phone input-icon"></span>
                        </div>
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12">
                        <label class="label-text">Address</label>
                        <div class="form-group">
                            <input class="@error('address') is-invalid @enderror form-control form--control" type="text" name="address" value="{{ $user->address }}">
                            <span class="la la-address-card input-icon"></span>
                        </div>
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">Save Changes</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div>


@endsection
