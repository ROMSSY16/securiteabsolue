@extends('layouts.auth')
@section('content')

    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-2 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            
                            <h2>Connexion || Administration</h2>
                            <p>Renseignez votre Email et votre Mot de passe pour la connexion au compte </p>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Entrer votre email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">Mot de passe</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                    placeholder="Entrer votre mot de passe" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                    <label class="form-check-label" for="form-check-default">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100">SE CONNECTER</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="text-center">
                                <p class="mb-0">Mot de passe oublié ? <a href="javascript:void(0);" class="text-warning">Cliquez ici</a></p>
                            </div>
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
                
@endsection