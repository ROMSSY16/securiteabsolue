@extends('layouts.admin')
@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            @include('partials.__breadcrumbs')
            <!-- /BREADCRUMB -->
            <div class="row layout-top-spacing">
                <div class="col-md-10 mx-auto">
                    <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card mb-2 p-2">
                            <div class="card-header align-self-end mt-3 mb-3">
                                <button type="button" class="btn btn-secondary">Retour</button>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img id="logo_preview" src="{{asset($settings->logo)}}" class="card-img-top mb-1" alt="logo">
                                    <input class="form-control" type="file" name="logo">
                                </div>
                                <div class="col-md-10 p-2 align-self-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="no_telephone" class="form-label">Telephone</label>
                                                <input type="text" name="no_telephone" id="no_telephone" class="form-control" value="{{ old('no_telephone') ?? $settings->no_telephone }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le Numero de telephone.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="no_telephone2" class="form-label">Telephone 2</label>
                                                <input type="text" name="no_telephone2" id="no_telephone2" class="form-control" value="{{ old('no_telephone2') ?? $settings->no_telephone2 ?? null }}">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le Numero de telephone 2.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $settings->email }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer le E-mail.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="email2">Email 2</label>
                                                <input type="email2" class="form-control" id="email2" name="email2" value="{{ $settings->email2 }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="horaires">Horaires</label>
                                                <input type="text" class="form-control" id="horaires" name="horaires" value="{{ $settings->horaires }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer les horaires.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="localisation">Localisation</label>
                                                <input type="text" class="form-control" id="localisation" name="localisation" value="{{ $settings->localisation }}" required>
                                                <div class="invalid-feedback">
                                                    Veuillez entrer la localisation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link_fb">Lien Facebook</label>
                                                <input type="url" class="form-control" id="link_fb" name="link_fb" value="{{ $settings->link_fb }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link_tw">Lien Twitter</label>
                                                <input type="url" class="form-control" id="link_tw" name="link_tw" value="{{ $settings->link_tw }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="link_ld">Lien LinkedIn</label>
                                                <input type="url" class="form-control" id="link_ld" name="link_ld" value="{{ $settings->link_ld }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="longitude">Longitude</label>
                                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $settings->longitude }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $settings->latitude }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

            document.querySelector('input[name="logo"]').addEventListener('change', function () {
                previewImage(this, 'logo_preview');
            });
        });
    </script>
    
@endsection