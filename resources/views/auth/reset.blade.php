@extends('layouts.app-client')
@section('content')
<main class="login-form" style="padding-top: 90px;padding-bottom: 155px">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Modifier votre mot de passe</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('postResetPassword',$reset_code) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Nouveau Mot passe" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection