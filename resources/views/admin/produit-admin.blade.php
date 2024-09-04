@extends('layouts.app-admin')
@section('content')
<div>

    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center">List Produit</h3><a href="{{ route('Ajouter-produits-admin') }}" class="btn btn-success btn-outline-success text-white btn-sm" ><i class="bi bi-plus"></i> Produit</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Nom</th>
                                  <th>Classe</th>
                                  <th>Prix</th>
                                  <th>Détails</th>
                                  <th>Réduction</th>
                                  <th>Nouveau prix</th>
                                  <th>Quantité</th>
                                  <th>PhotoProfile</th>
                                  <th>2Photo</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($produits as $item)
                              <tr>
                                  <td>{{ $item->code }}</td>
                                  <td>{{ $item->nom }}</td>
                                  <td>{{ $item->classe }}</td>
                                  <td>{{ $item->prix }} €</td>
                                  <td>{{ $item->details }}</td>
                                  <td>{{ $item->reduction }}</td>
                                  <td>@if($item->new_prix)
                                        {{ $item->new_prix}} €
                                      @endif
                                  </td>
                                  <td>{{ $item->quantité }}</td>
                                  <td><img  style="width: 50px ;height: 50px" src="{{asset('images/produit-profil/'.$item->photoprofil)}}"></td>
                                  <td><img  style="width: 50px ;height: 50px" src="{{asset('images/produit/'.$item->photo)}}"></td>
                                  <td>
                                    <a class="btn btn-primary btn-sm" role="button" href="{{route('edit-produit-admin',$item->code)}}"><i class="bi bi-pencil-square"></i></a>
                                     <a class="btn btn-danger btn-sm" role="button" href="{{route('delete-produit-admin',$item->code)}}"><i class="bi bi-trash-fill"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="row">{{$produits->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection