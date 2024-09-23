@extends('layouts.admin')
@section('content')

<!-- Inclusion des CSS et JS nécessaires pour FilePond et l'éditeur -->
<link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

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
                    <button data-bs-toggle="modal" data-bs-target="#addService" class="btn btn-success p-2">
                        NOUVEAU SERVICE
                    </button>
                </div> 
            </div>
        </div>
        
        <div class="row">
            @foreach($services as $key => $service)
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 service-item">
                <a data-bs-toggle="modal" data-bs-target="#editService{{$key}}" class="card style-2 mb-md-0 mb-4">
                    <img src="{{asset($service->image)}}" class="card-img-top" alt="{{$service->name}}">
                    <div class="card-body px-0 pb-0">
                        <h5 class="card-title mb-3 service-title">{{$service->name}}</h5>
                        <div class="media mt-4 mb-0 pt-1">
                            <div class="media-body">
                                <p class="media-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($service->description), 100, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Edit modal --}}
            <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="editService{{$key}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered rotateInDownLeft modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title item-center" id="exampleModalLabel">Modifier le service {{ $service->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nom du service</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $service->name }}" required>
                                            <div class="invalid-feedback">
                                                Veuillez entrer le titre du service.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control summernote" name="description" cols="30" rows="10">{{$service->description}}</textarea>
                                            <div class="invalid-feedback">
                                                Veuillez entrer la description du service.
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <img src="{{$service->image ? asset($service->image) : '' }}" class="card-img-top" alt="{{$service->name}}">
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
</div> 

<div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="addService" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rotateInDownLeft modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name" class="form-label">Nom de service</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer le nom du service.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" cols="30" rows="10"></textarea>
                                <div class="invalid-feedback">
                                    Veuillez décrire le service.
                                </div>
                            </div>                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'description...',
            tabsize: 2,
            height: 300
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-input');
            const services = document.querySelectorAll('.service-item');
    
            searchInput.addEventListener('keyup', function () {
                const searchQuery = this.value.toLowerCase();
    
                services.forEach(service => {
                    const title = service.querySelector('.service-title').textContent.toLowerCase();
                    if (title.includes(searchQuery)) {
                        service.style.display = '';
                    } else {
                        service.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#contactForm').on('submit', function (event) {
                var form = this;
                
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                $(form).addClass('was-validated');
            });
        });
    </script>
   
@endsection