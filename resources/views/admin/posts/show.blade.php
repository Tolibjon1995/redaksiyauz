@extends('layouts.admin')
@section('content')


    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Katigoriya malimotlari</h5>
                <a class="btn btn-primary float-right" href="{{route('admin.post.index')}}">Ortga</a>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="">
                        <tr>
                            <th>ID</th><td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <th>Post title UZ</th><td>{{ $post->title_uz }}</td>
                        </tr>
                        <tr>
                            <th>Post title RU</th><td>{{ $post->title_ru }}</td>
                        </tr>
                        <tr>
                            <th>Post body UZ</th><td>{!! $post->body_uz !!}</td>
                        </tr>
                        <tr>
                            <th>Post body RU</th><td>{!! $post->body_ru !!}</td>
                        </tr>
                        <tr>
                            <th>Post image</th><td><img src="/site/image/posts/{{$post->image}}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Category</th><td>{{ $post->category->name_uz }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th><td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <th>Ko'rishlar soni</th><td>{{ $post->view }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
