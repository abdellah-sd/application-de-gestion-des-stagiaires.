@extends('layouts.main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Responsables</h1>
</div>
<!-- Cart -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Modifier le mot de pass</h6>
            <a href="{{ route('responsable.edit', $responsable->id) }}" class="btn bg-primary text-white">
                <i class="fa fa-undo" aria-hidden="true"></i>
                Retour
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ route('responsable.change.password', $responsable->id ) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nouveau mot de pass') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de pass') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                            
                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier mot de pass') }}
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