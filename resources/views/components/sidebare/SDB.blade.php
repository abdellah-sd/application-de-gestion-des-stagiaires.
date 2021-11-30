<!-- Sidebar - Brand -->
@include('components.sidebare.components_sidebar.sidebar_brand')

<!-- Divider -->
<hr class="sidebar-divider my-0">
@if(Auth()->user()->type_user == 2)

    <!-- Heading -->
    <div class="sidebar-heading">
        Consulter information
    </div>

@endif

<!-- Nav Item - Dashboard -->
@include('components.sidebare.components_sidebar.dashbord')

@if(Auth()->user()->type_user == 1)

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('users.create') }}">
            <i class="fa fa-plus"></i>
            <span>Ajouter Admin</span>
        </a>
    </li>

@endif

@if(Auth()->user()->type_user == 1 || Auth()->user()->type_user == 3)
        <!-- Divider -->
        @include('components.sidebare.components_sidebar.divider')

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestion
        </div>
    @if (Auth()->user()->type_user == 1)
        <!-- Nav Item - Gérer Responsable -->
        @include('components.sidebare.components_sidebar.nav_items.gererR')

        <!-- Nav Item - Gérer Employe -->
        @include('components.sidebare.components_sidebar.nav_items.gererE')    
    @endif

        <!-- Nav Item - Pages Collapse Menu -->
        @include('components.sidebare.components_sidebar.nav_items.gererS')


@endif



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
@include('components.sidebare.components_sidebar.toggle')

    
