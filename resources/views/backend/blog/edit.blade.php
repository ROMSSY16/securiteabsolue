
@extends('layouts.admin')
@push('css')
<link href="{{ asset('backend/src/assets/css/light/apps/blog-create.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/src/assets/css/dark/apps/blog-create.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            @include('partials.__breadcrumbs')
            <!-- /BREADCRUMB -->                
            <div class="row layout-top-spacing">
                <div class="col-md-10 mx-auto">
                <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updates -->
                    <div class="row mb-4 layout-spacing layout-top-spacing p-3">
                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 p-3">
                            <div class="widget-content widget-content-area blog-create-section p-3">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="post-title" placeholder="Titre du post" value="{{ old('title', $post->title) }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Contenu du post</label>
                                        <textarea class="form-control summernote @error('content') is-invalid @enderror" placeholder="Contenu du blog" rows="5" name="content">{{ old('content', $post->content) }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4 p-3">
                            <div class="widget-content widget-content-area blog-create-section p-3">
                                <div class="row">
                                    <div class="col-xxl-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-primary">
                                            <input class="switch-input" type="checkbox" name="published" role="switch" id="showPublicly" value="1" {{ old('published', $post->published) ? 'checked' : '' }}>
                                            <label class="switch-label" for="showPublicly">Publier</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 mb-4">
                                        <select class="form-select" name="category_id">
                                            <option value="">Toutes les catégories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="product-images">Image du post</label>
                                        <img id="image_preview" src="{{ asset($post->image) }}" class="card-img-top mb-1" alt="image">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button type="submit" class="btn btn-success w-100">Modifier le Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
        $('.summernote').summernote({
            placeholder: 'description...',
            tabsize: 2,
            height: 300
        });

        document.addEventListener('DOMContentLoaded', function () {
            function previewImage(input, imagePreviewId) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(imagePreviewId).src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.querySelector('input[name="image"]').addEventListener('change', function () {
                previewImage(this, 'image_preview');
            });
        });
    </script>
<script src="{{ asset('backend/src/assets/js/apps/blog-create.js') }}"></script>
@endpush