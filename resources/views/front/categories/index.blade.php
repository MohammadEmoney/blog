@extends('layouts.front')

@section('title', $title = 'دسته بندی ها')

@section('content')
<div class="container px-4 px-lg-5" dir="rtl">
    <div class="text-center my-3">
        <h1>{{ $title }}</h1>
    </div>
    <div class="row">
        @foreach($categories as $category)
        <div class="card col-md-3 my-2 mx-3">
            <div class="card-body">
            <h5 class="card-title"><a href="{{ route('front.categories.show', $category->slug) }}">{{ $category->name }}</a></h5>
            <p class="card-text">{{ $category->description }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $category->updated_at->diffForHumans() }}</small></p>
            </div>
        </div>
        @endforeach
        <div class="card col-md-3 my-2 mx-3">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card col-md-3 my-2 mx-3">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
@endsection
