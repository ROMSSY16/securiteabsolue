@extends('layouts.admin')
@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            @include('partials.__breadcrumbs')
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <div class="col-lg-5 col-md-5 col-sm-12 mb-4">
                    <input id="search-input" type="text" name="search" placeholder="Search" class="form-control" value="{{ request()->search }}">
                </div>
                
                <div class="col-lg-7 col-md-7 col-sm-12 mb-4">
                    <div class="text-end">
                        <a href="{{ url()->previous() }}" class="btn btn-primary me-3 p-2">
                            Retour
                        </a>
                        <button data-bs-toggle="modal" data-bs-target="#addProjet" class="btn btn-info p-2">
                            NOUVEAU PROJET
                        </button>
                    </div> 
                </div>
            </div>
            
            <div class="row">

                @foreach($portfolios as $key => $portfolio)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 portfolio-item">
                    <a data-bs-toggle="modal" data-bs-target="#editPortfolio{{$key}}" class="card style-2 mb-md-0 mb-4">
                        <img src="{{$portfolio->image ? asset($portfolio->image) : '' }}" class="card-img-top" alt="{{$portfolio->title}}">
                        {{-- <div class="card-body px-0 pb-0">
                            <h5 class="card-title mb-3 portfolio-title">{{$portfolio->title}}</h5>
                            <p>{{ $portfolio->description ?? null }}</p>
                            <div class="media mt-4 mb-0 pt-1">
                                <div class="media-body">
                                    <h4 class="media-heading fw-bold mb-1">{{ $portfolio->category ?? null}}</h4>
                                    <p class="media-text">{{ $portfolio->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div> --}}
                    </a>
                </div>

                {{-- Edit modal  --}}
                <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="editPortfolio{{$key}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered rotateInDownLeft modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title item-center" id="exampleModalLabel">Modifier le projet {{ $portfolio->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Titre</label>
                                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $portfolio->title }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le titre du projet réalisé.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="category" class="form-label">Catégorie</label>
                                                <input type="text" name="category" id="category" class="form-control" value="{{ old('category') ?? $portfolio->category }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer la catégorie du projet réalisé.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control summernote" name="description" id="description" cols="30" rows="10">{{$portfolio->description}}</textarea>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer la description du projet réalisé.
                                                </div>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <img src="{{$portfolio->image ? asset($portfolio->image) : '' }}" class="card-img-top" alt="{{$portfolio->title}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="image">
                                                <div class="invalid-feedback">
                                                    Veuillez ajouter une image.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">MODIFIER</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>

        </div>
        

        <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="addProjet" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered rotateInDownLeft modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un projet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title')}}" required>
                                        <div class="invalid-feedback">
                                            Veuillez entrer le titre du projet réalisé.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="category" class="form-label">Catégorie</label>
                                        <input type="text" name="category" id="category" class="form-control" value="{{ old('category')}}" required>
                                        <div class="invalid-feedback">
                                            Veuillez entrer la catégorie du projet réalisé.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control summernote" name="description" id="description" cols="30" rows="10"></textarea>
                                        <div class="invalid-feedback">
                                            Veuillez entrer la description du projet réalisé.
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <div class="invalid-feedback">
                                            Veuillez ajouter une image.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'description...',
            tabsize:2,
            height:300
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-input');
            const portfolios = document.querySelectorAll('.portfolio-item');
    
            searchInput.addEventListener('keyup', function () {
                const searchQuery = this.value.toLowerCase();
    
                portfolios.forEach(portfolio => {
                    const title = portfolio.querySelector('.portfolio-title').textContent.toLowerCase();
                    // Filtrer par titre (ajouter d'autres éléments à rechercher si nécessaire)
                    if (title.includes(searchQuery)) {
                        portfolio.style.display = '';
                    } else {
                        portfolio.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection