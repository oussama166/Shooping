@extends('layouts.app-client')
@section('content')
<main class="signup-form" style="padding-top: 40px;padding-bottom: 59px">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Inscription</h3>
                    <div class="card-body">
                        <form action="{{ route('register.client') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label >Entre Nom  :</label><br>
                                <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom"
                                    required autofocus>
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Entre Prénom  :</label><br>
                                <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom"
                                    required autofocus>
                                @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Date de Naissance  :</label><br>
                                <input type="date" placeholder="Date de Naissance" id="datenaissance" class="form-control" name="datenaissance"
                                    required autofocus>
                                @if ($errors->has('datenaissance'))
                                <span class="text-danger">{{ $errors->first('datenaissance') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Entre Numéro du Téléphone  :</label><br>
                                <input type="text" placeholder="Num" id="num" class="form-control" name="num"
                                    required autofocus>
                                @if ($errors->has('num'))
                                <span class="text-danger">{{ $errors->first('num') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                            <label >Email:</label><br>
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                            <label >Mot de passe:</label><br>
                                <input type="password" placeholder="Mot de passe" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block">s'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection