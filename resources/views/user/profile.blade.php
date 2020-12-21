@extends('user.main')
@section('content')
    <section class="container-fluid">

        <div class="row">
            <div class="col-xl-10 col-md-8 col-lg-9 ml-auto">
                <h1> پروفایل کاربری :  {{$user->name}}</h1>
                <form action="{{route('user.profile.update',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <img width="150px" height="" class="img-profile rounded-circle " src="/uploads/avatars/{{$user->avatar}}">
                </div>
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>


                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{$user->name}}">
                    @error('name')
                    {{-- <div class="alert alert-danger">
                         {{$message}}
                     </div>--}}
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">پست الکترونیکی</label>
                    <input type="email" name="email" id="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" name="password" id="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" >
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password-confirmation">تایید رمز</label>
                    <input type="password" name="password_confirmation" id="password-confirmation" class="form-control {{$errors->has('password_confirmation')?'is-invalid':''}}" >
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">بروزرسانی</button>

            </form>
        </div>
    </div>
    </section>

@endsection
