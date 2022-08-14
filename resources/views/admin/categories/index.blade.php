@extends('layouts.admin')

@section('title', $title = "دسته بندی ها")

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a href="{{ route('categories.create') }}" class="btn btn-primary">افزودن</a></h1>
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
                  <th>نام</th>
                  <th>نامک</th>
                  <th>دسته بندی اصلی</th>
                  <th>توضیحات</th>
                  <th>عملیات</th>
                </tr>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ ($categories->currentpage()-1) * $categories->perpage() + $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent ? $category->parent->name : "-" }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('categories.edit', $category->id) }}">ویرایش</a>
                            <button class="btn btn-danger delete-row" data-category-id="{{ $category->id }}">حذف</button>
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $categories->links("pagination::bootstrap-4") }}
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
            category_id = $this.data('category-id');
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ url('categories') }}/" + category_id,
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
