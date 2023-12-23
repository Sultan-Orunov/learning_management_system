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


        <div class="setting-body d-flex flex-column flex-wrap">
            <h3 class="fs-17 font-weight-semi-bold pb-5">Change Password</h3>
            <form action="{{ route('user.password.update', $user->id) }}" method="post" class="row">
                @csrf @method('patch')
                <div class="input-box col-lg-7 ">
                    <label class="label-text">Old Password</label>
                    <div class="form-group">
                        <input class="@error('old_password') is-invalid @enderror form-control form--control" type="text" name="old_password" placeholder="Old Password">
                        <span class="la la-lock input-icon"></span>
                    </div>
                    @error('old_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div><!-- end input-box -->
                <div class="input-box col-lg-7 mt-2">
                    <label class="label-text">New Password</label>
                    <div class="form-group">
                        <input class="@error('password') is-invalid @enderror form-control form--control" type="text" name="password" placeholder="New Password">
                        <span class="la la-lock input-icon"></span>
                    </div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div><!-- end input-box -->
                <div class="input-box col-lg-7 mt-2">
                    <label class="label-text">Confirm New Password</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="password_confirmation" placeholder="Confirm New Password">
                        <span class="la la-lock input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12 py-2 my-2">
                    <button class="btn theme-btn">Change Password</button>
                </div><!-- end input-box -->
            </form>
        </div><!-- end setting-body -->

@endsection
