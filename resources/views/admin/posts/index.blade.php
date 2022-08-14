@extends('layouts.admin')

@section('title', $title = "پست ها")

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a href="{{ route('posts.create') }}" class="btn btn-primary">افزودن</a></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>تصویر</th>
                  <th>نام</th>
                  <th>نامک</th>
                  <th>دسته بندی اصلی</th>
                  <th>توضیحات</th>
                  <th>کاربر</th>
                  <th style="width: 140px">عملیات</th>
                </tr>
                @foreach ($posts as $key => $post)
                    <tr>
                        <td>{{ ($posts->currentpage()-1) * $posts->perpage() + $key + 1 }}</td>
                        <td>
                            @if($post->image)
                                <img class="direct-chat-img" src="{{ $post->image->src }}" alt="{{ $post->image->alt ?? "$post->name" }}">
                            @else
                                <img class="direct-chat-img" src="{{ asset('admin/dist/img/default-150x150.png') }}" alt="no image">
                            @endif
                        </td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->short_description }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('posts.edit', $post->id) }}">ویرایش</a>
                            <button class="btn btn-sm btn-danger delete-row" data-post-id="{{ $post->id }}">حذف</button>
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $posts->links("pagination::bootstrap-4") }}
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('scripts')
<script>
    $('.delete-row').on('click', function(e) {
        e.preventDefault();
        var $this = $(this),
            post_id = $this.data('post-id');
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ url('posts') }}/" + post_id,
            data: {
                _method: 'DELETE'
            },
            success: function (response, textStatus, xhr) {
                $this.closest("tr").remove();
            }
        });
    })
</script>
@endsection
