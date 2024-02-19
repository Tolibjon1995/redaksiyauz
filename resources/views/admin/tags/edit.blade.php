@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Kategoriyani o'zgartirish</h6>
                        <hr>
                        <form action="{{route('admin.tag.update',$tag->id)}}" class="row g-3" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Kategoriya nomi UZ</label>
                                <input type="text" value="{{$tag->name_uz}}" name="name_uz" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kategoriya nomi RU</label>
                                <input type="text" value="{{$tag->name_ru}}" name="name_ru" class="form-control">
                            </div>                        
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">O'zgartirish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
