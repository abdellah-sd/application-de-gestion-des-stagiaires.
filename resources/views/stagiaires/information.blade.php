@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stagiaire</h1>
        <a href="{{ route('stagiaire.index') }}" class="btn bg-primary text-white">
            <i class="fa fa-undo" aria-hidden="true"></i>
            Retour
        </a>
    </div>
    <div class="row">    
        <!-- ID -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Id
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->id }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Username -->
        

        <!-- Name -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Nom
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->first_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last name -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Prénom
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->last_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Birthday -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Date de naissance
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->birthday }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Birthplace -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Lieu de naissance
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->birthplace }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- gender -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Genre
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->gender }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adress -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Adresse
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->adress }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phone -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Phone
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->phone }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-phone fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Email
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->email }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annee -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Année d'étude
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->annee }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- date debut stage --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Date de debut de stage
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->date_debut }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- date fin stage --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Date fin de stage
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->date_fin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Attachment --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Attachment
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ( $stagiaire->attachment == 1 )
                                    Déposé
                                @else
                                    Non Déposé
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- memoire --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Mémoire
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ( $stagiaire->memoire == 1 )
                                    Déposé
                                @else
                                    Non Déposé
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- date depose mémoire --}}
        @if ( $stagiaire->memoire == 1 )
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                    Date de dépose mémoire
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->date_depose_memoire }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{-- universite --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Université
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->universite->name }}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fa fa-university fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- universite short name --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Court nom d'université
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->universite->short_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-university fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- universite location --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Localisation d'université
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->universite->location }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-university fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- specialite --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Spécialité
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->specialite->name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- specialite short name --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Court nom de spécialité
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->specialite->short_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- departement --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Département
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->departement->name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- departement short name --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Court nom de Département
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->departement->short_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- encadreur name --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Nom d'encadreur
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->encadreur->name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- encadreur last name --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Prénom d'encadreur
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->encadreur->last_name }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- theme --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Thème
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stagiaire->stage->theme }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    
@endsection