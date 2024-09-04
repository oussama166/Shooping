@extends('layouts.app-admin')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Modifier User</h3>
                    <div class="card-body">
                        <form action="{{ route('update-user',$users->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" value="{{$users->nom}}" placeholder="Nom" id="nom" class="form-control" name="nom"
                                    required autofocus>
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" value="{{$users->prenom}}" placeholder="Prénom" id="prenom" class="form-control" name="prenom"
                                    required autofocus>
                                @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" value="{{$users->datenaissance}}" placeholder="Date de Naissance" id="datenaissance" class="form-control" name="datenaissance"
                                    required autofocus>
                                @if ($errors->has('datenaissance'))
                                <span class="text-danger">{{ $errors->first('datenaissance') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" value="{{$users->email}}"  id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection