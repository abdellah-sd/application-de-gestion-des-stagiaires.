<!-- Nombre des stagiaires -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Nombre des stagiaires
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbr_stg ?? '' }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Nombre des stagiaires -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Nombre des stagiaires validé
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbr_stagiaire_valide ?? '' }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Nombre des stagiaires -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Nombre des stagiaires en cours
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbr_stagiaire_enCours ?? '' }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Nombre des stagiaires -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Nombre des stagiaires refusé
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nbr_stagiaire_refuse ?? '' }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list des université --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Liste des universités
                    </div>
                    <a href="{{ route('list.universite') }}" class="btn btn-primary">voir</a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list des stages --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Liste des stages
                    </div>
                    <a href="{{ route('list.stage') }}" class="btn btn-primary">voir</a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list des départements --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Liste des départements
                    </div>
                    <a href="{{ route('list.departement') }}" class="btn btn-primary">voir</a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list des encadreurs --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Liste des encadreurs
                    </div>
                    <a href="{{ route('list.encadreur') }}" class="btn btn-primary">voir</a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- list des spécialités --}}
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text font-weight-bold text-warning text-uppercase mb-1">
                        Liste des spécialités
                    </div>
                    <a href="{{ route('list.specialite') }}" class="btn btn-primary">voir</a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
