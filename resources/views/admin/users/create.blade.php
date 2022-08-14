@extends('layouts.admin')

@section('title', $title = "افزودن کاربر")

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">کاربران</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row justify-content-md-center">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">پسورد</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="پسورد" value="{{ old('password') }}" minlength="8" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">تکرار پسورد</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="پسورد" value="{{ old('password_confirmation') }}" minlength="8" required>
                </div>
                <div class="form-group">
                    <label for="role_id">نقش کاربر</label>
                    <select class="form-control" name="role_id" id="role_id" required>
                        <option value="">-</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ثبت</button>
                <a class="btn btn-danger" href="{{ route('users.index') }}">لغو</a>
            </div>
        </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
