@extends('layouts.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stages</h1>
    </div>
    <!-- Cart -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Modifier stage</h6>
                <a href="{{ route('stagiaire.index') }}" class="btn bg-primary text-white">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                    Retour
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">     
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.stage', $stage->id ) }}" autocomplete="off">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group row">
                                <label for="theme" class="col-md-4 col-form-label text-md-right">{{ __('Thème') }}</label>
                                <div class="col-md-6">
                                    <input id="theme" type="text" class="form-control @error('theme') is-invalid @enderror" name="theme" value="{{ $stage->theme }}" required autofocus>
                                    @error('theme')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection