<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResponsable"
        aria-expanded="true" aria-controls="collapseResponsable">
        <i class="fas fa-fw fa-cog"></i>
        <span>Gérer Responsables</span>
    </a>
    <div id="collapseResponsable" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Options :</h6>
            <a class="collapse-item" href="{{ route('responsable.dashboard') }}">Tableau de bord</a>
            <a class="collapse-item" href="{{ route('responsable.index') }}">Liste des responsables</a>
            <a class="collapse-item" href="{{ route('responsable.create') }}">Ajouter responsable</a>
        </div>
    </div>
</li>