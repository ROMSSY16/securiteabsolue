@extends('layouts.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            @include('partials.__breadcrumbs')
            <!-- /BREADCRUMB -->
            <div class="row layout-top-spacing">
                <div class="col-lg-9 col-md-9 col-sm-12 mb-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input id="search-input" type="text" name="search" placeholder="Search" class="form-control" value="{{ request()->search }}">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <form method="GET" action="{{ route('admin.blog.index') }}"> 
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <select class="form-select" name="category">
                                            <option value="All Category" {{ request()->category == 'All Category' ? 'selected' : '' }}>Toutes les catégories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <select class="form-select" name="sort">
                                            <option value="Recent" {{ request()->sort == 'Recent' ? 'selected' : '' }}>Récents</option>
                                            <option value="Popular" {{ request()->sort == 'Popular' ? 'selected' : '' }}>Populaire</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100 p-2">Filtrer</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                    <div class="text-end">
                        <a href="{{ url()->previous() }}" class="btn btn-primary me-3 p-2">Retour</a>
                        <button data-bs-toggle="modal" data-bs-target="#addPost" class="btn btn-success p-2">NOUVEAU POST</button>
                    </div>
                </div>
            </div>


            <div class="row">

                @foreach($posts as $post)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 post-item">
                    <a href="{{route('admin.blog.show', $post->id)}}" class="card style-2 mb-md-0 mb-4">
                        <img src="{{$post->image ? asset($post->image) : '' }}" class="card-img-top" alt="{{$post->title}}">
                        <div class="card-body px-0 pb-0">
                            <h5 class="card-title mb-3 post-title">{{$post->title}}</h5>
                            <div class="media mt-4 mb-0 pt-1">
                                <img src="{{ $post->user->profile_image ?? asset('default_user.png') }}" class="card-media-image me-3" alt="">
                                <div class="media-body">
                                    <h4 class="media-heading mb-1">{{ $post->user->name ?? null}}</h4>
                                    <p class="media-text">{{ $post->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
        
    </div> 


    <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="addPost" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rotateInDownLeft modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4 layout-spacing layout-top-spacing p-3">
                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 p-3">
                            <div class="widget-content widget-content-area blog-create-section p-3">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="post-title" placeholder="Titre du post" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Contenu du post</label>
                                        <textarea class="form-control summernote @error('content') is-invalid @enderror" placeholder="Contenu du blog" rows="5" name="content">{{ old('content') }}</textarea>
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
                                            <input class="switch-input" type="checkbox" name="published" role="switch" id="showPublicly" value="1">
                                            <label class="switch-label" for="showPublicly">Publier</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 mb-4">
                                        <select class="form-select" name="category_id">
                                            <option value="">Toutes les catégories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="product-images">Image du post</label>
                                        <img id="image_preview" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAAYFBMVEXa2tpVVVXd3d1MTExSUlK2trZvb29LS0tTU1Ph4eGNjY2cnJzU1NRaWlpgYGBPT0+np6fGxsavr6/AwMCGhoZqamrOzs51dXWUlJSioqJ+fn7IyMhkZGTBwcG0tLREREQ0AqeBAAAClklEQVR4nO3b63KqMBRAYUiiSbyhKIqXtu//lgcUBRTOFGGm42Z9/5oK06wyQFCDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCmpAfz2X96hjMh2O/+vpvEXNrTNDcZ/aIAqHQwMa0EBCA2O1fZeOtBPQIEonfWxXAhro2Pe5N/IrJ6DButefL6RBr/tcEQ2ijg2elgbja6DUVxzvqxuMroHaTLMLqdlVhsbWQJ2duZ5CDuXY6BocijtLW24ztgb7+821m461gZro++pgKbrB/4J8PRqsJDdQk1NrBRUUa4Mw2j2mLLFBYmet01Hrn9vpwO0FHwcq1qFO2yOkNnKRDiflK+Q1CC7ZjPS8PcJ2l0zTvS83EddAHa9nPXtsj6C899Ulg7gGwfI2ofyZQu2l7XuR1sCnUfFkzMbVOaltewRpDRb3y3/ozKQy7UV4aj0UhDXwu8qDZlv+77PxKFm0RJDVQJ11mSA0y/Nj3GY/XvbNEYQ1ONXebzCmmLU/5AtmE20bpymqgfqyYY1ZXSOo79vhYVzcNE9RDfzUhM8RFvkvikm23DZIalBZGD/kZ0I1L8f17PWcIKlBkLiXBqFJgkVl2OnXa6SgBn7d+AZsdNrVxq9HRm0vghqosOEwyI+EpzRmtZHawB9fzwbNTHXhHEhqsFj+MkG+Qe0aKaaB2vz2MMjZ1JenRjkNzp0+kqJ3Ap+hqE23j+Xow2MJJafBOWq+LLRwOltCFbeXYhps3LKr7W0vYhpkF4bubnsR1OBtNBDTwPdyEdDAHWZ9pMUd5kc3yJZFvYQSGgyDBjSgwUc3SH/0UKz+zAbB5rvXp/Zr4g/9ch/fbwQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAbv4BqeU7MkrRIMQAAAAASUVORK5CYII=" class="card-img-top mb-1" alt="image">
                                        <input class="form-control" type="file" name="image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                        <button type="submit" class="btn btn-success w-100">Ajouter le Post</button>
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
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('search-input');
                const posts = document.querySelectorAll('.post-item');
        
                searchInput.addEventListener('keyup', function () {
                    const searchQuery = this.value.toLowerCase();
        
                    posts.forEach(post => {
                        const title = post.querySelector('.post-title').textContent.toLowerCase();
                        // Filtrer par titre (ajouter d'autres éléments à rechercher si nécessaire)
                        if (title.includes(searchQuery)) {
                            post.style.display = '';
                        } else {
                            post.style.display = 'none';
                        }
                    });
                });
            });

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
    @endpush