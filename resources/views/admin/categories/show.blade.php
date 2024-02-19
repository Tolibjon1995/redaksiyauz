@extends('layouts.admin')
@section('content')


    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Katigoriya malimotlari</h5>
                <a class="btn btn-primary float-right" href="{{route('admin.categories.index')}}">Ortga</a>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th><td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Nomi UZ</th><td>{{ $category->name_uz }}</td>
                        </tr>
                        <tr>
                            <th>Nomi RU</th><td>{{ $category->name_ru }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th><td>{{ $category->slug }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
