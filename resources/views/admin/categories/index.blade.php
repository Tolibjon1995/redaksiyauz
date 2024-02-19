@extends('layouts.admin')
@section('content')
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Katigoriyalar</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary">Qo'shish</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Ro'yxat</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon
                            name="search-sharp"></ion-icon></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Nomi UZ</th>
                            <th>Nomi RU</th>
                            <th>Slug</th>
                            <th>Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name_uz }}</td>
                                <td>{{ $category->name_ru }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{ route('admin.categories.show', $category->id) }}"
                                            class="btn btn-primary text-light" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Ko'rish"
                                            aria-label="Ko'rish">
                                            <ion-icon name="eye-sharp"></ion-icon>
                                        </a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-success text-light" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="O'zgartirish"
                                            aria-label="O'zgartirish">
                                            <ion-icon name="pencil-sharp"></ion-icon>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="" class="btn btn-danger text-light"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                                data-bs-original-title="O'chirish" aria-label="O'chirish" onclick="return confirm('O\'chirishni tasdiqlaysizmi')">
                                                <ion-icon name="trash-sharp"></ion-icon>
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
