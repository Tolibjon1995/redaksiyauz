@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Tag qo'shish</h6>
                        <hr>
                        <form action="{{route('admin.tag.store')}}" class="row g-3" method="POST">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Tag nomi UZ</label>
                                <input type="text" name="name_uz" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tag nomi RU</label>
                                <input type="text" name="name_ru" class="form-control">
                            </div>                       
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Yuborish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
