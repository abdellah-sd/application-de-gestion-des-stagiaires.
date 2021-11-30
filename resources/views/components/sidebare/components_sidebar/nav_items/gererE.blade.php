<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmploye"
        aria-expanded="true" aria-controls="collapseEmploye">
        <i class="fas fa-fw fa-cog"></i>
        <span>Gérer employés</span>
    </a>
    <div id="collapseEmploye" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Options :</h6>
            <a class="collapse-item" href="{{ route('employe.dashboard') }}">Tableau de bord</a>
            <a class="collapse-item" href="{{ route('employe.index') }}">Liste des employés</a>
            <a class="collapse-item" href="{{ route('employe.create') }}">Ajouter employé</a>
        </div>
    </div>
</li>