@extends('layouts.app-admin')
@section('content')
<div>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class=" text-center">List utilisateurs</h3><a href="{{ route('Ajouter-Users') }}" class="btn btn-success text-white btn-sm"><i class="bi bi-person-add"></i> utilisateur</a>
                    </div>
                    <div class="card-body">
                                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de Naissance</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                        @if(($item->validadmin)=='user')
                                            <tr>
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->nom }}</td>
                                                <td>{{ $item->prenom }}</td>
                                                <td>{{ $item->datenaissance }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm"><a style="text-decoration:none; color:white" href="{{route('edit-user',$item->id)}}"><i class="bi bi-pencil-square"></i></a></button>
                                                    <button class="btn btn-danger btn-sm" ><a style="text-decoration:none; color:white" href="{{route('delete-user',$item->id)}}"><i class="bi bi-trash-fill"></i></a></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">{{$users->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection