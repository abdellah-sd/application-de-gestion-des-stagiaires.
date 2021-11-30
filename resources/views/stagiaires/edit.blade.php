@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stagiaires</h1>
    </div>
    <!-- Cart -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Modifier un stagiaire</h6>
                <a href="{{ route('stagiaire.index') }}" class="btn bg-primary text-white">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                    Retour
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">     
                    <div class="card-body">
                        <form method="POST" action="{{ route('stagiaire.update', $stagiaire->id ) }}" autocomplete="off">
                            @csrf
                            @method('PUT')
            
                            {{-- Stagiaire information --}}
                            <div class="card mb-4">
                                <div class="card-header text-dark">
                                    Stagiaire information
                                </div>
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                        <div class="col-md-6">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $stagiaire->first_name }}" required autofocus>
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
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $stagiaire->last_name }}" required>
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
                                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $stagiaire->birthday }}" required>
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
                                            <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ $stagiaire->birthplace }}" required>
                                            @error('birthplace')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>
                                        <div class="col-md-6">
                                            @if ( $stagiaire->gender == "homme" )
                                                <input id="gender" type="radio" class="m-2 @error('gender') is-invalid @enderror" name="gender" value="homme" checked> <label for="homme">Homme</label>
                                                <input id="gender" type="radio" class="m-2 @error('gender') is-invalid @enderror" name="gender" value="femme"> <label for="femme">Femme</label>  
                                            @else
                                                <input id="gender" type="radio" class="m-2 @error('gender') is-invalid @enderror" name="gender" value="homme"> <label for="homme">Homme</label> 
                                                <input id="gender" type="radio" class="m-2 @error('gender') is-invalid @enderror" name="gender" value="femme" checked> <label for="femme">Femme</label> 
                                            @endif
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
                                        <div class="col-md-6">
                                            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ $stagiaire->adress }}" required>
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
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $stagiaire->phone }}" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $stagiaire->email }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row">
                                        <label for="annee" class="col-md-4 col-form-label text-md-right">{{ __('Année d\'étude') }}</label>
                                        <div class="col-md-6">
                                            <input id="annee" type="text" class="form-control @error('annee') is-invalid @enderror" name="annee" value="{{ $stagiaire->annee }}" required>
                                            @error('annee')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
 
                                </div>
                            </div>

                            {{-- Université information --}}
                            <div class="card mb-4">
                                <div class="card-header mb-2">
                                    <div class="text-dark">Université information</div>
                                </div>
                                <div class="cart-body">
                                    <div class="form-group row">
                                        <label for="universite" class="col-md-4 col-form-label text-md-right">{{ __('Université') }}</label>
                                        <div class="col-md-6">
                                            <select name="universite" id="universite" class="form-control @error('universite') is-invalid @enderror" onchange="selectUniversiteItems()" required>
                                                <option value=""></option>
                                                @foreach ($universites as $universite)
                                                        <option 
                                                            value="{{ $universite->id }}"
                                                            @if ( $stagiaire->universite_id == $universite->id ) selected @endif
                                                            >
                                                                {{ $universite->name }}
                                                        </option>
                                                @endforeach
                                                </select>
                                            @error('universite')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="universite_short_name" class="col-md-4 col-form-label text-md-right">{{ __('Court nom d\'université') }}</label>
                                        <div class="col-md-6">
                                            <select name="universite_short_name" id="universite_short_name" class="form-control @error('universite_short_name') is-invalid @enderror" disabled>
                                                <option value=""></option>
                                                @foreach ($universites as $universite)
                                                    <option 
                                                        value="{{ $universite->id }}"
                                                        @if ( $stagiaire->universite_id == $universite->id ) selected @endif
                                                        >
                                                            {{ $universite->short_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('universite_short_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="universite_location" class="col-md-4 col-form-label text-md-right">{{ __('Localisation d\'université') }}</label>
                                        <div class="col-md-6">
                                            <select name="universite_location" id="universite_location" class="form-control @error('universite_location') is-invalid @enderror" disabled>
                                                <option value=""></option>
                                                @foreach ($universites as $universite)
                                                    <option 
                                                        value="{{ $universite->id }}"
                                                        @if ( $stagiaire->universite_id == $universite->id ) selected @endif
                                                        >
                                                            {{ $universite->location }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('universite_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('edit.universite', $stagiaire->universite_id ) }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('create.universite') }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Spécialite information --}}
                            <div class="card mb-4">
                                <div class="card-header mb-2">
                                    <div class="text-dark">Spécialité information</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="specialite" class="col-md-4 col-form-label text-md-right">{{ __('Spécialité') }}</label>
                                        <div class="col-md-6">
                                            <select name="specialite" id="specialite" class="form-control @error('specialite') is-invalide @enderror" onchange="selectSpecialiteItems()" required>
                                                <option value=""></option>
                                                @foreach ($specialites as $specialite)
                                                    <option 
                                                        value="{{ $specialite->id }}"
                                                        @if ( $stagiaire->specialite_id == $specialite->id ) selected @endif
                                                        >
                                                            {{ $specialite->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('specialite')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row">
                                        <label for="short_name_specialite" class="col-md-4 col-form-label text-md-right">{{ __('Court nom spécialité') }}</label>
                                        <div class="col-md-6">
                                            <select name="short_name_specialite" id="short_name_specialite" class="form-control @error('short_name_specialite') is-invalid @enderror" disabled>
                                                <option value=""></option>
                                                @foreach ($specialites as $specialite)
                                                    <option 
                                                        value="{{ $specialite->id }}"
                                                        @if ( $stagiaire->specialite_id == $specialite->id ) selected @endif
                                                        >
                                                            {{ $specialite->short_name }}
                                                        </option>
                                                @endforeach
                                            </select>
                                            @error('short_name_specialite')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col-md-2 offset-md-8">
                                            <a href="{{ route('create.specialite') }}" class="btn btn-primary form-control">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div> --}}
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('edit.specialite', $stagiaire->specialite_id) }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('create.specialite') }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Département information --}}
                            <div class="card mb-4">
                                <div class="card-header mb-2">
                                    <div class="text-dark">Département information</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="departement" class="col-md-4 col-form-label text-md-right">{{ __('Département') }}</label>
                                        <div class="col-md-6">
                                            <select name="departement" id="departement" class="form-control @error('departement') is-invalid @enderror" onchange="selectDepartementItems()" required>
                                                <option value=""></option>
                                                @foreach ($departements as $departement)
                                                    <option 
                                                        value="{{ $departement->id }}"
                                                        @if ( $stagiaire->departement_id == $departement->id ) selected @endif
                                                        >
                                                            {{ $departement->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('departement')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="short_name_departement" class="col-md-4 col-form-label text-md-right">{{ __('Court nom département') }}</label>
                                        <div class="col-md-6">
                                            <select name="short_name_departement" id="short_name_departement" class="form-control @error('short_name_departement') is-invalid @enderror" disabled>
                                                <option value=""></option>
                                                @foreach ($departements as $departement)
                                                    <option 
                                                        value="{{ $departement->id }}"
                                                        @if ( $stagiaire->departement_id == $departement->id ) selected @endif
                                                        >
                                                            {{ $departement->short_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('short_name_departement')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-2 offset-md-8">
                                            <a href="{{ route('create.departement') }}" class="btn btn-primary form-control">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('edit.departement', $stagiaire->departement_id) }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('create.departement') }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Encadreur information --}}
                            <div class="card mb-4">
                                <div class="card-header mb-2">
                                    <div class="text-dark">Encadreur information</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="encadreur" class="col-md-4 col-form-label text-md-right">{{ __('Nom encadreur') }}</label>
                                        <div class="col-md-6">
                                            <select name="encadreur" id="encadreur" class="form-control @error('encadreur') is-invalid @enderror" onchange="selectEncadreurItems()" required>
                                                <option value=""></option>
                                                @foreach ($encadreurs as $encadreur)
                                                    <option 
                                                        value="{{ $encadreur->id }}"
                                                        @if ( $stagiaire->encadreur_id == $encadreur->id ) selected @endif
                                                        >
                                                            {{ $encadreur->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('encadreur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="last_name_encadreur" class="col-md-4 col-form-label text-md-right">{{ __('Prénom encadreur') }}</label>
                                        <div class="col-md-6">
                                            <select name="last_name_encadreur" id="last_name_encadreur" class="form-control @error('last_name_encadreur') is-invalid @enderror" disabled>
                                                <option value=""></option>
                                                @foreach ($encadreurs as $encadreur)
                                                    <option 
                                                        value="{{ $encadreur->id }}"
                                                        @if ( $stagiaire->encadreur_id == $encadreur->id ) selected @endif
                                                        >
                                                            {{ $encadreur->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('last_name_encadreur')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-2 offset-md-8">
                                            <a href="{{ route('create.encadreur') }}" class="btn btn-primary form-control">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('edit.encadreur', $stagiaire->encadreur_id) }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('create.encadreur') }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Stage information --}}
                            <div class="card mb-4">
                                <div class="card-header mb-2">
                                    <div class="text-dark">Stage information</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="theme" class="col-md-4 col-form-label text-md-right">{{ __('Thème') }}</label>
                                        <div class="col-md-6">
                                            <select name="theme" id="theme" class="form-control @error('theme') is-invalid @enderror" onchange="selectStageItems()" required>
                                                <option value=""></option>
                                                @foreach ($stages as $stage)
                                                    <option 
                                                        value="{{ $stage->id }}"
                                                        @if ( $stagiaire->stage_id == $stage->id ) selected @endif
                                                        >
                                                            {{ $stage->theme }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('theme')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date_debut" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ $stagiaire->date_debut }}" required >
                                            @error('date_debut')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="date_fin" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_fin" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ $stagiaire->date_fin }}" required >
                                            @error('date_fin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="attachment" class="col-md-4 col-form-label text-md-right">{{ __('Attachment') }}</label>
                                        <div class="col-md-6">
                                            <select id="attachment" class="form-control @error('attachment') is-invalid @enderror" name="attachment" required>
                                                <option 
                                                    value="0"
                                                    @if ( $stagiaire->attachment == 0 ) selected @endif
                                                    >
                                                        Non déposer
                                                </option>
                                                <option
                                                    value="1"
                                                    @if ( $stagiaire->attachment == 1 ) selected @endif
                                                    >
                                                        Déposer
                                                </option>
                                            </select>
                                            @error('attachment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="memoire" class="col-md-4 col-form-label text-md-right">{{ __('Mémoire') }}</label>
                                        <div class="col-md-6">
                                            <select name="memoire" class="form-control @error('memoire') is-invalid @enderror" id="memoire" required>
                                                <option 
                                                    value="0"
                                                    @if ( $stagiaire->memoire == 0 ) selected @endif
                                                    >
                                                        Pas déposer
                                                </option>
                                                <option
                                                    value="1"
                                                    @if ( $stagiaire->attachment == 1 ) selected @endif
                                                    >
                                                        Déposer
                                                </option>
                                            </select>
                                            @error('memoire')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="date_depose_memoire" class="col-md-4 col-form-label text-md-right">{{ __('Date de dépot mémoire') }}</label>
                                        <div class="col-md-6">
                                            <input id="date_depose_memoire" type="date" class="form-control @error('date_depose_memoire') is-invalid @enderror" name="date_depose_memoire" value="{{ $stagiaire->date_depose_memoire }}">
                                            @error('date_depose_memoire')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('edit.stage', $stagiaire->stage_id) }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('create.stage') }}" class="btn btn-primary form-control">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        // completé les élément d'universite
        function selectUniversiteItems() {
            var universiteName = document.getElementById('universite').value,
                universiteShortNames = document.getElementById('universite_short_name').options,
                universiteLocations = document.getElementById('universite_location').options;
            for (let index = 0; index < universiteShortNames.length; index++) {
                if ( universiteShortNames[index].value == universiteName ) {
                    universiteShortNames[index].selected = true;
                    break 
                }
            }
            for (let index = 0; index < universiteLocations.length; index++) {
                if (universiteLocations[index].value == universiteName ) {
                    universiteLocations[index].selected = true;
                }
            }
        }
        selectUniversiteItems();

        // completé les élément de spécialité
        function selectSpecialiteItems() {
            
            var specialiteName = document.getElementById('specialite').value,
                specialiteShortName = document.getElementById('short_name_specialite').options;
            for (let index = 0; index < specialiteShortName.length; index++) {
                if (specialiteShortName[index].value == specialiteName ) {
                    specialiteShortName[index].selected = true;
                    break;
                }                
            }
        }
        selectSpecialiteItems();

        // completé les éléments de département
        function selectDepartementItems(){
            var departementName = document.getElementById('departement').value,
                departementShortName = document.getElementById('short_name_departement').options;
            for (let index = 0; index < departementShortName.length; index++) {
                if ( departementShortName[index].value == departementName ) {
                    departementShortName[index].selected = true;
                    break;
                }                
            }
        }
        selectDepartementItems();

        // completé les élément d'encadreur
        function selectEncadreurItems () {
            var encadreurName = document.getElementById('encadreur').value,
                encadreurLastName = document.getElementById('last_name_encadreur').options;
            for (let index = 0; index < encadreurLastName.length; index++) {
                if ( encadreurLastName[index].value == encadreurName ) {
                    encadreurLastName[index].selected = true;
                    break;
                }                
            }
        }
        selectEncadreurItems();

    </script>
    
@endsection