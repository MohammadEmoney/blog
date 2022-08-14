@extends('layouts.admin')

@section('title', $title = "ویرایش پست $post->name")

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
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">پست ها</a></li>
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
            @include('layouts.errors')
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="نام پست" value="{{ old('name', $post->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">نامک</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="نامک پست" value="{{ old('slug', $post->slug) }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">دسته بندی</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">وضعیت</label>
                        <select class="form-control" name="status" id="status">
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" @selected(old('status', $post->status) == $key)>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">ارسال فایل</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        @if($post->image)
                            <img class="image-gallery-item" src="{{ asset($post->image->src) }}" alt="{{ $post->image->alt }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="short_description">توضیحات کوتاه</label>
                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10">{{ old('short_description', $post->short_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $post->description) }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ویرایش</button>
                    <a class="btn btn-danger" href="{{ route('posts.index') }}">لغو</a>
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

@section('scripts')
<script>
    $(document).ready(function () {
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
            .create(document.querySelector('#description'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: { fa: true }
            })
        })
    });
    // $("#editor").CKeditor();
</script>
@endsection
