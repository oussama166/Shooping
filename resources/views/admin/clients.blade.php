@extends('layouts.app-admin')
@section('content')
<div>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center">Clients</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Nom</th>
                                  <th>Prénom</th>
                                  <th>Date de Naissance</th>
                                  <th>Numéro de Téléphone</th>
                                  <th>Email</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($clients as $item)
                                @if(($item->validadmin)=='client')  
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->datenaissance }}</td>
                                        <td>{{ $item->num }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{route('delete-client',$item->id)}}"><button class="btn btn-danger btn-sm" ><i class="bi bi-trash-fill"></i></button></a>
                                        </td>
                                    </tr>
                                @endif
                              @endforeach
                            </tbody>
                          </table>
                          <div class="row">{{$clients->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection