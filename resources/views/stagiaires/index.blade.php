@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stagiaires</h1>
    </div>

    <form action="{{ route('stagiaire.index') }}" method="POST" autocomplete="off">
        @csrf
        @method('GET')
        <div class="row mx-3 row-cols-1 row-cols-sm-2 row-cols-md-4">
            
            <div class="col mb-2">
                <label for="universite" class="mx-2">{{ __('Universités') }}</label>
                <select name="universite" id="universite" class="form-control border-2 mx-1">
                    <option value=""></option>
                    <optgroup label="nom">
                        @foreach ($universites as $universite)
                            <option value="{{ $universite->id }}">{{ $universite->name }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Court nom">
                        @foreach ($universites as $universite)
                            <option value="{{ $universite->id }}">{{ $universite->short_name }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Localisation">
                        @foreach ($universites as $universite)
                            <option value="{{ $universite->id }}">{{ $universite->location }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="col mb-2">
                <label for="specialite" class="mx-2">{{ __('Spécialités') }}</label>
                <select name="specialite" id="specialite" class="form-control border-2 mx-1">
                    <option value=""></option>
                    <optgroup label="Nom">
                        @foreach ($specialites as $specialite)
                            <option value="{{ $specialite->id }}">{{ $specialite->name }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Court nom">
                        @foreach ($specialites as $specialite)
                            <option value="{{ $specialite->id }}">{{ $specialite->short_name }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="col mb-2">
                <label for="departement" class="mx-2">{{ __('Départements') }}</label>
                <select name="departement" id="departement" class="form-control border-2 mx-1">
                    <option value=""></option>
                    <optgroup label="Nom">
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Court nom">
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->short_name }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="col mb-2">
                <label for="encadreur" class="mx-2">{{ __('Encadreurs') }}</label>
                <select name="encadreur" id="encadreur" class="form-control border-2 mx-1">
                    <option value=""></option>
                    <optgroup label="Nom">
                        @foreach ($encadreurs as $encadreur)
                            <option value="{{ $encadreur->id }}">{{ $encadreur->name }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Prénom">
                        @foreach ($encadreurs as $encadreur)
                            <option value="{{ $encadreur->id }}">{{ $encadreur->last_name }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

        </div>
        
        <div class="row mx-3 row-cols-1 row-cols-sm-2">

            <div class="col-sm-4 mb-2">
                <label for="stages" class="mx-2">{{ __('Stages') }}</label>
                <select name="stages" id="stages" class="form-control border-2 mx-1">
                    <option value=""></option>
                    <optgroup label="Thème">
                        @foreach ($stages as $stage)
                            <option value="{{ $stage->id }}">{{ $stage->theme }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            <div class="col-sm-8">
                <div class="form-row align-items-center">
                    <div class="col mb-2">
                        <label class="mx-2">Stagiaires</label>
                        <div class="input-group">
                            <input type="search" name="search" id="search" class="form-control bg-light border-2 small" placeholder="Rechercher...">
                            <select name="selector" id="selector" class="form-control" onchange="selectField();">
                                <option value="first_name">Nom</option>
                                <option value="last_name">Prénom</option>
                                <option value="birthday">Date de naissance</option>
                                <option value="birthplace">Lieu de naissance</option>
                                <option value="gender">Sexe</option>
                                <option value="adress">Adresse</option>
                                <option value="phone">Numéro de téléphone</option>
                                <option value="email">Adress E-mail</option>
                                <option value="annee">Année d'étude</option>
                                <option value="date_debut">Date de début</option>
                                <option value="date_fin">Date de fin</option>
                                <option value="memoire">Mémoire</option>
                                <option value="date_depose_memoire">Date de dépose de mémoire</option>
                                <option value="attachment">Attachment</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i> Rechercher
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            
        </div>
    </form>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List des stagiaires</h6>
                @if ( Auth::user()->type_user == 3)
                    <a href="{{ route('stagiaire.create') }}" class="btn bg-primary text-white">
                        <i class="fa fa-plus"></i>
                        Ajouter
                    </a>
                @endif
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                @if ($staAge ?? false)
                                    <th scope="col">Age</th>
                                @elseif ($staGender ?? false)
                                    <th scope="col">Sexe</th>
                                @elseif ($staAdress ?? false)
                                    <th scope="col">Adresse</th>
                                @elseif ($staPhone ?? false)
                                    <th scope="col">Numéro de téléphone</th>
                                @elseif ($staEmail ?? false)
                                    <th scope="col">Adresse email</th>
                                @elseif ($staAnnee ?? false)
                                    <th scope="col">Année d'étude</th>
                                @elseif ($staDateDebut ?? false)
                                    <th scope="col">Date de début de stage</th>
                                @elseif ($staDateFin ?? false)
                                    <th scope="col">Date de fin de stage</th>
                                @elseif ($staMemoire ?? false)
                                    <th scope="col">Mémoire</th>
                                @elseif ($staDateDeposeMemoire ?? false)
                                    <th scope="col">Date de dépose de mémoire</th>
                                @elseif ($staAttachment ?? false)
                                    <th scope="col">Attachment</th>
                                @endif
                                <th scope="col">Status</th>
                                {{-- @if ( Auth::user()->type_user == 3) --}}
                                    <th scope="col" colspan="3">Action</th>
                                {{--                                 
                                @endif
                                @if ( Auth::user()->type_user == 1)
                                    <th scope="col">Action</th>
                                @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stagiaires as $stagiaire)
                                <tr>
                                    <th scope="row">{{ $stagiaire->id }}</th>
                                    <td>{{ $stagiaire->first_name }}</td>
                                    <td>{{ $stagiaire->last_name }}</td>
                                    @if ($staBirthday ?? false)
                                        <td>{{ $stagiaire->birthday }}</td>
                                    @elseif ($staBirthplace ?? false)
                                        <td>{{ $stagiaire->birthplace }}</td>
                                    @elseif ($staGender ?? false)
                                        <td>{{ $stagiaire->gender }}</td>
                                    @elseif ($staAdress ?? false)
                                        <td>{{ $stagiaire->adress }}</td>
                                    @elseif ($staPhone ?? false)
                                        <td>{{ $stagiaire->phone }}</td>
                                    @elseif ($staEmail ?? false)
                                        <td>{{ $stagiaire->email }}</td>
                                    @elseif ($staAnnee ?? false)
                                        <td>{{ $stagiaire->annee }}</td>
                                    @elseif ($staDateDebut ?? false)
                                        <td>{{ $stagiaire->date_debut }}</td>
                                    @elseif ($staDateFin ?? false)
                                        <td>{{ $stagiaire->date_fin }}</td>
                                    @elseif ($staMemoire ?? false)
                                        <td>{{ $stagiaire->memoire }}</td>
                                    @elseif ($staDateDeposeMemoire ?? false)
                                        <td>{{ $stagiaire->date_depose_memoire }}</td>
                                    @elseif ($staAttachment ?? false)
                                        <td>{{ $stagiaire->attachment }}</td>
                                    @endif
                                    @if ( $stagiaire->memoire )
                                        <td align="center"> <div style="background-color: rgb(19, 194, 19); border-radius: 5px; color:white;">Validé</div></td>
                                    @elseif ( \Carbon\Carbon::parse($stagiaire->date_debut)->lte($date) && \Carbon\Carbon::parse($stagiaire->date_fin)->gte($date) && !$stagiaire->memoire )
                                        <td align="center"> <div style="background-color: rgb(255, 251, 0); border-radius: 5px; ">En Cours</td>
                                    @else
                                        <td align="center"> <div style="background-color: rgb(202, 0, 0); border-radius: 5px; color:white;">En Instance</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('stagiaire.show', $stagiaire->id ) }}">
                                            <i class="fa fa-eye text-success" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    {{-- @if ( Auth::user()->type_user == 3 ) --}}
                                    <td>
                                        <a href="{{ route('stagiaire.edit', $stagiaire->id ) }}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>            
                                    </td>
                                    <td>
                                        <a href="#" class="btn m-0 p-0" data-toggle="modal" data-target="#deleteModal{{ $stagiaire->id }}">
                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <form method="POST" action="{{ route('stagiaire.destroy', $stagiaire->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="deleteModal{{ $stagiaire->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    voulez-vous supprimer <span class="font-weight-bold">{{ $stagiaire->first_name }} {{ $stagiaire->last_name }}</span> ?
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Anuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- @endif --}}
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">-</th>
                                    <td>-</td>
                                    <td>-</td>
                                    @if ($staBirthday ?? false)
                                        <td>-</td>
                                    @elseif ($staBirthplace ?? false)
                                        <td>-</td>
                                    @elseif ($staGender ?? false)
                                        <td>-</td>
                                    @elseif ($staAdress ?? false)
                                        <td>-</td>
                                    @elseif ($staPhone ?? false)
                                        <td>-</td>
                                    @elseif ($staEmail ?? false)
                                        <td>-</td>
                                    @elseif ($staAnnee ?? false)
                                        <td>-</td>
                                    @elseif ($staDateDebut ?? false)
                                        <td>-</td>
                                    @elseif ($staDateFin ?? false)
                                        <td>-</td>
                                    @elseif ($staMemoire ?? false)
                                        <td>-</td>
                                    @elseif ($staDateDeposeMemoire ?? false)
                                        <td>-</td>
                                    @elseif ($staAttachment ?? false)
                                        <td>-</td>
                                    @endif
                                    <td>-</td>
                                    <td>
                                        <div class="disabled">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </div>
                                    </td>
                                    {{-- @if ( Auth::user()->type_user == 3) --}}
                                        <td>
                                            <div class="disabled">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="disabled">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </div>
                                        </td>
                                    {{-- @endif --}}
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>  
    </div>

@endsection