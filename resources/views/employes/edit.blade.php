@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employés</h1>
    </div>
    <!-- Cart -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Modifier un Employés</h6>
                <a href="{{ route('employe.index') }}" class="btn bg-primary text-white">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                    Retour
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">     
                    <div class="card-body">
                        <form method="POST" action="{{ route('employe.update', $employe->id ) }}" autocomplete="off">
                                @csrf
                                @method('PUT')
    
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nom d\'utilisateur') }}</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $employe->username ) }}" required autofocus>        
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
            
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $employe->first_name ) }}" required>
            
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
        
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $employe->last_name ) }}" required>
            
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
    
                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $employe->birthday }}" required>
    
                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="birthplace" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de naissance') }}</label>
    
                                <div class="col-md-6">
                                    <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ $employe->birthplace }}" required>
    
                                    @error('birthplace')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
            
                                <div class="col-md-6">
                                    <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress', $employe->adress ) }}" required>
                                        
                                    @error('adress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employe->phone ) }}" required>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employe->email ) }}" required>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de pass') }}</label>
                                    
                                <div class="col-md-6">
                                    <a href="{{ route('employe.edit.password', $employe->id) }}" class="btn text-primary border-primary">
                                        <i class="fa fa-edit"></i> Changer
                                    </a>    
                                </div>
                            </div>
                                
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="m-2 p-2">
                <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Supprimer {{ $employe->username }}</button>
            </div>
        </div>
    </div>
    
    <form method="POST" action="{{ route('employe.destroy', $employe->id) }}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    voulez-vous supprimer <span class="font-weight-bold">{{ $employe->username }}</span> ?
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Anuler</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
@endsection