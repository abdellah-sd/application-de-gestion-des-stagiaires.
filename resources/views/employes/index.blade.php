@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employés</h1>
    </div>
    <div class="row">
        <form action="{{ route('employe.index') }}" method="POST" autocomplete="off">
            @csrf
            @method('GET')
            <div class="form-row align-items-center m-3">
                <div class="col mx-3">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control bg-light border-2 small" placeholder="Rechercher...">
                        <select name="selector" id="" class="form-control">
                            <option value="username">Nom d'utilisateur</option>
                            <option value="first_name">Nom</option>
                            <option value="last_name">Prénom</option>
                            <option value="birthday">Date de naissance</option>
                            <option value="birthplace">Lieu de naissance</option>
                            <option value="adress">Adresse</option>
                            <option value="phone">Numéro de téléphone</option>
                            <option value="email">Email</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i> Rechercher
                            </button>
                        </div>
                    </div>
                </div>  
        </form>      
    </div>

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
                <h6 class="m-0 font-weight-bold text-primary">Liste des employés</h6>
                <a href="{{ route('employe.create') }}" class="btn bg-primary text-white">
                    <i class="fa fa-plus"></i>
                    Ajouter
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                @if ($empUsername ?? false)
                                    <th scope="col">Nom d'utilisateur</th>
                                @elseif ($empBirthday ?? false)
                                    <th scope="col">Date de naissance</th>
                                @elseif ($empBirthplace ?? false)
                                    <th>Lieu de naissance</th>
                                @elseif ($empAdress ?? false)
                                    <th scope="col">Adresse</th>
                                @elseif ($empPhone ?? false)
                                    <th scope="col">Numéro de téléphone</th>
                                @elseif ($empEmail ?? false)
                                    <th scope="col">Adresse email</th>
                                @endif
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employes as $employe)
                                <tr>
                                    <th scope="row">{{ $employe->id }}</th>
                                    <td>{{ $employe->first_name }}</td>
                                    <td>{{ $employe->last_name }}</td>
                                    @if ($empUsername ?? false)
                                        <td>{{ $employe->username }}</td>
                                    @elseif ($empBirthday ?? false)
                                        <td>{{ $employe->birthday }}</td>
                                    @elseif ($empBirthplace ?? false)
                                        <td>{{ $employe->birthplace }}</td>
                                    @elseif ($empAdress ?? false)
                                        <td>{{ $employe->adress }}</td>
                                    @elseif ($empPhone ?? false)
                                        <td>{{ $employe->phone }}</td>
                                    @elseif ($empEmail ?? false)
                                        <td>{{ $employe->email }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('employe.show', $employe->id ) }}">
                                            <i class="fa fa-eye text-success" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('employe.edit', $employe->id ) }}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>            
                                    </td>
                                    <td>
                                        <a href="#" class="btn m-0 p-0" data-toggle="modal" data-target="#deleteModal{{ $employe->id }}">
                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <form method="POST" action="{{ route('employe.destroy', $employe->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="deleteModal{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">-</th>
                                    <td>-</td>
                                    <td>-</td>
                                    @if ($empUsername ?? false)
                                        <td>-</td>
                                    @elseif ($empBirthday ?? false)
                                        <td>-</td>
                                    @elseif ($empBirthplace ?? false)
                                        <td>-</td>
                                    @elseif ($empAdress ?? false)
                                        <td>-</td>
                                    @elseif ($empPhone ?? false)
                                        <td>-</td>
                                    @elseif ($empEmail ?? false)
                                        <td>-</td>
                                    @endif
                                    <td>
                                        <div class="disabled">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </div>
                                    </td>
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
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>

    

@endsection

@push('')
<script>
    $(document).on('click','.delete',function(){
        var userID=$(this).attr('data-id');
        $('#app_id').val(userID); 
        $('#applicantDeleteModal').modal('show'); 
    });
</script>
@endpush
    
