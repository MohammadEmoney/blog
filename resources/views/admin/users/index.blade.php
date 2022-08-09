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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
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
                  <th>تاریخ ثبتنام</th>
                  {{-- <th style="width: 40px">درصد</th> --}}
                </tr>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($user->created_at) }}</td>
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
