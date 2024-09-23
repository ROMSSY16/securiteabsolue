@extends('layouts.admin')
@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            @include('partials.__breadcrumbs')
            <!-- /BREADCRUMB -->
            <div class="row layout-top-spacing">
                <div class="col-md-10 mx-auto">
                    <form action="{{route('admin.apparence.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card mb-2 p-2">
                            <div class="card-header align-self-end mt-3 mb-3">
                                <button type="button" class="btn btn-secondary">Retour</button>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <img id="slide1_preview" src="{{asset($apparence->slide1_image)}}" class="card-img-top mb-1" alt="{{$apparence->slide1_titre}}">
                                    <input class="form-control" type="file" name="slide1_image">
                                </div>
                                <div class="col-md-7 p-2 align-self-center">
                                    <div class="form-group mb-2">
                                        <label for="slide1_titre" class="form-label">Titre</label>
                                        <input type="text" name="slide1_titre" id="slide1_titre" class="form-control" value="{{ old('slide1_titre') ?? $apparence->slide1_titre }}" placeholder="UN TRAVAIL DE QUALITE AVEC UN TARIF COMPÉTITIF" required>
                                        <div class="invalid-feedback">
                                            Veuillez entrer le titre du slide 1.
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slide1_description" class="form-label">Description</label>
                                        <textarea type="text" name="slide1_description" id="slide1_description" class="form-control" value="{{ old('slide1_description') ?? $apparence->slide1_description }}" rows="3" placeholder="Nous offrons une gamme complète de services pour répondre à tous vos besoins, Vous avez un projet de construction ?">{{$apparence->slide1_description}}</textarea>
                                        <div class="invalid-feedback">
                                            Veuillez entrer la description slide 1.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group mb-2">
                                                <label for="slide1_button_titre" class="form-label">Titre Button</label>
                                                <input type="text" name="slide1_button_titre" id="slide1_button_titre" class="form-control" value="{{ old('slide1_button_titre') ?? $apparence->slide1_button_titre}}" placeholder="CONTACTEZ-NOUS">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le titre button du slide 1.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group mb-2">
                                                <label for="slide1_button_link" class="form-label">Lien Button</label>
                                                <input type="text" name="slide1_button_link" id="slide1_button_link" class="form-control" value="{{ old('slide1_button_link') ?? $apparence->slide1_button_link}}">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le lien button du slide 1.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <img id="slide2_preview" src="{{asset($apparence->slide2_image)}}" class="card-img-top mb-1" alt="{{$apparence->slide2_titre}}">
                                    <input class="form-control" type="file" name="slide2_image">
                                </div>
                                <div class="col-md-7 p-2 align-self-center">
                                    <div class="form-group mb-2">
                                        <label for="slide2_titre" class="form-label">Titre</label>
                                        <input type="text" name="slide2_titre" id="slide2_titre" class="form-control" value="{{ old('slide2_titre') ?? $apparence->slide2_titre }}" placeholder="UN TRAVAIL DE QUALITE AVEC UN TARIF COMPÉTITIF" required>
                                        <div class="invalid-feedback">
                                            Veuillez entrer le titre du slide 2.
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slide2_description" class="form-label">Description</label>
                                        <textarea type="text" name="slide2_description" id="slide2_description" class="form-control" value="{{ old('slide2_description') ?? $apparence->slide2_description }}" rows="3" placeholder="Nous offrons une gamme complète de services pour répondre à tous vos besoins, Vous avez un projet de construction ?">{{$apparence->slide2_description}}</textarea>
                                        <div class="invalid-feedback">
                                            Veuillez entrer la description slide 2.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group mb-2">
                                                <label for="slide2_button_titre" class="form-label">Titre Button</label>
                                                <input type="text" name="slide2_button_titre" id="slide2_button_titre" class="form-control" value="{{ old('slide2_button_titre') ?? $apparence->slide2_button_titre}}" placeholder="CONTACTEZ-NOUS">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le titre button du slide 2.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group mb-2">
                                                <label for="slide2_button_link" class="form-label">Lien Button</label>
                                                <input type="text" name="slide2_button_link" id="slide2_button_link" class="form-control" value="{{ old('slide2_button_link') ?? $apparence->slide2_button_link }}">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le lien button du slide 2.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <img id="slide3_preview" src="{{asset($apparence->slide3_image)}}" class="card-img-top mb-1" alt="{{$apparence->slide3_titre}}">
                                    <input class="form-control" type="file" name="slide3_image">
                                </div>
                                <div class="col-md-7 p-2 align-self-center">
                                    <div class="form-group mb-2">
                                        <label for="slide3_titre" class="form-label">Titre</label>
                                        <input type="text" name="slide3_titre" id="slide3_titre" class="form-control" value="{{ old('slide3_titre') ?? $apparence->slide3_titre }}" placeholder="UN TRAVAIL DE QUALITE AVEC UN TARIF COMPÉTITIF" required>
                                        <div class="invalid-feedback">
                                            Veuillez entrer le titre du slide 3.
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slide3_description" class="form-label">Description</label>
                                        <textarea type="text" name="slide3_description" id="slide3_description" class="form-control" value="{{ old('slide3_description') ?? $apparence->slide3_description}}" rows="3" placeholder="Nous offrons une gamme complète de services pour répondre à tous vos besoins, Vous avez un projet de construction ?">{{$apparence->slide3_description}}</textarea>
                                        <div class="invalid-feedback">
                                            Veuillez entrer la description slide 3.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group mb-2">
                                                <label for="slide3_button_titre" class="form-label">Titre Button</label>
                                                <input type="text" name="slide3_button_titre" id="slide3_button_titre" class="form-control" value="{{ old('slide3_button_titre') ?? $apparence->slide3_button_titre}}" placeholder="CONTACTEZ-NOUS">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le titre button du slide 3.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group mb-2">
                                                <label for="slide3_button_link" class="form-label">Lien Button</label>
                                                <input type="text" name="slide3_button_link" id="slide3_button_link" class="form-control" value="{{ old('slide3_button_link') ?? $apparence->slide3_button_link}}">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le lien button du slide 3.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="m-2 form-group">
                                        <label class="form-label" for="image_atout">Image Atout</label>
                                        <img id="image_atout_preview" src="{{asset($apparence->image_atout)}}" class="card-img-top mb-1" alt="{{ $apparence->section3_title }}">
                                        <input type="file" class="form-control" name="image_atout" id="image_atout">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="m-2 form-group">
                                        <label class="form-label" for="image_bg">Image Background</label>
                                        <img id="image_bg_preview" src="{{asset($apparence->image_bg)}}" class="card-img-top mb-1" alt="{{ $apparence->section3_title }}">
                                        <input type="file" class="form-control" name="image_bg" id="image_bg">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="m-2 form-group">
                                        <label class="form-label" for="video_image">Video Image</label>
                                        <img id="video_image_preview" src="{{asset($apparence->video_image)}}" class="card-img-top mb-1" alt="{{ $apparence->section3_title }}">
                                        <input type="file" class="form-control" name="video_image" id="video_image">
                                    </div>
                                </div>
                            </div>
                            <div class="m-2 mb-3">
                                <label class="form-label" for="video_link">Video Link</label>
                                <input type="text" class="form-control" name="video_link" id="video_link" value="{{ $apparence->video_link }}">
                            </div>
                            <div class="card-footer align-self-end mt-3">
                                <button type="button" class="btn btn-secondary">Retour</button>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
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

            document.querySelector('input[name="slide1_image"]').addEventListener('change', function () {
                previewImage(this, 'slide1_preview');
            });
    
            document.querySelector('input[name="slide2_image"]').addEventListener('change', function () {
                previewImage(this, 'slide2_preview');
            });
    
            document.querySelector('input[name="slide3_image"]').addEventListener('change', function () {
                previewImage(this, 'slide3_preview');
            });
    
            document.querySelector('input[name="image_atout"]').addEventListener('change', function () {
                previewImage(this, 'image_atout_preview');
            });
    
            document.querySelector('input[name="image_bg"]').addEventListener('change', function () {
                previewImage(this, 'image_bg_preview');
            });
    
            document.querySelector('input[name="video_image"]').addEventListener('change', function () {
                previewImage(this, 'video_image_preview');
            });
        });
    </script>
    
@endsection