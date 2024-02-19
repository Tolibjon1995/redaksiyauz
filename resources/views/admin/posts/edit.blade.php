@extends('layouts.admin')
@section('css')
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
    <link href="/admin/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/admin/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Post qo'shish</h6>
                        <hr>
                        <form action="{{ route('admin.post.update', $post->id) }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Post title UZ</label>
                                <input type="text" value="{{ $post->title_uz }}" name="title_uz" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Post title RU</label>
                                <input type="text" value="{{ $post->title_ru }}" name="title_ru" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Post body UZ</label>
                                <textarea id="editor" type="text" name="body_uz" class="form-control" id="ckeditor1">{{ $post->body_uz }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Post body RU</label>
                                <textarea id="editor2" type="text" name="body_ru" class="form-control" id="ckeditor1">{{ $post->body_ru }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Rasm</label>
                                <input type="file" class="form-control" name="image">
                                <img src="/site/image/posts/{{ $post->image }}" width="150" alt="">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kategory</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tags</label>
                                <select name="tags[]" class="form-control multiple-select"
                                    data-placeholder="Choose anything" multiple="multiple">
                                    <option value="">Taglarni tanglang</option>
                                    @foreach ($tags as $tag)
                                        <option @if (in_array($tag->id,$post->tags->pluck('id')->toArray())) selected @endif value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Meta title</label>
                                <input type="text" value="{{ $post->meta_title }}" name="meta_title"
                                    class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Meta Description</label>
                                <input type="text" value="{{ $post->meta_description }}" name="meta_description"
                                    class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Meta keywords</label>
                                <input type="text" value="{{ $post->meta_keywords }}" name="meta_keywords"
                                    class="form-control">
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

@section('js')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script> --}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="/admin/assets/plugins/select2/js/select2.min.js"></script>
    <script src="/admin/assets/js/form-select2.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('body_uz', {
            filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('body_ru', {
            filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
