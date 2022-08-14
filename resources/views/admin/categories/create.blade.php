@extends('layouts.admin')

@section('title', $title = "افزودن دسته بندی")

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
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">دسته بندی ها</a></li>
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
            <form role="form" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="نام دسته بندی" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">نامک</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="نامک دسته بندی" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="parent_id">دسته بندی اصلی</label>
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">بدون دسته بندی اصلی</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slug">توضیحات</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                    <a class="btn btn-danger" href="{{ route('categories.index') }}">لغو</a>
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
