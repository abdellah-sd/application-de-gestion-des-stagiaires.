@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Responsables</h1>
        <a href="{{ route('responsable.index') }}" class="btn bg-primary text-white">
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->id }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Username -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Nom d'utilisateur
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->username }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-warning text-uppercase mb-1">
                                Nom
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->first_name }}</div>
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
                                Prenom
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->last_name }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->birthday }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->birthplace }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->adress }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->phone }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $responsable->email }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope fa-2x text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection