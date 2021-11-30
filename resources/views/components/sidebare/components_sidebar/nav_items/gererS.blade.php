<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStagiaire"
        aria-expanded="true" aria-controls="collapseStagiaire">
        <i class="fas fa-fw fa-cog"></i>
        <span>Gérer stagiaires</span>
    </a>
    <div id="collapseStagiaire" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Options:</h6>
            <a class="collapse-item" href="{{ route('stagiaire.dashboard') }}">Tableau de bord</a>
            <a class="collapse-item" href="{{ route('stagiaire.index') }}">Liste des stagiaires</a>
            {{-- @if (Auth()->user()->type_user == 3) --}}
                <a class="collapse-item" href="{{ route('stagiaire.create') }}">Ajouter stagiaire</a>
            {{-- @endif --}}
        </div>
    </div>
</li>