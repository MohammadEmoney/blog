@extends('layouts.admin')

@section('title', $title = "کاربران")

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><a href="{{ route('users.create') }}" class="btn btn-primary">افزودن</a></h1>
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
                  <th>ایمیل</th>
                  <th>نقش کاربر</th>
                  <th>تاریخ ثبتنام</th>
                  <th style="width: 140px">عملیات</th>
                </tr>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles ? $user->getRoleNames()->first() : "بدون نقش" }}</td>
                        <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($user->created_at) }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $user->id) }}">ویرایش</a>
                            <button class="btn btn-sm btn-danger delete-row" data-user-id="{{ $user->id }}">حذف</button>
                        </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $users->links("pagination::bootstrap-4") }}
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
            user_id = $this.data('user-id');
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ url('users') }}/" + user_id,
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
