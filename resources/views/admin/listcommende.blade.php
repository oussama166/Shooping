@extends('layouts.app-admin')
@section('content')
<div>
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center">Commande</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead>
                              <tr>
                                <th>Id</th>
                                <th>Id-client</th>
                                <th>Id-commende</th>
                                <th>Produits</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Prix-commende</th>
                                <th>Payment-verification</th>
                                <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($commende as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->id_client }}</td>
                                  <td>{{ $item->id_commende }}</td>
                                  <td>{{ $item->produits }}</td>
                                  <td>{{ $item->adresse }}</td>
                                  <td>{{ $item->ville }}</td>
                                  <td>{{ $item->prix_commende_total }}</td>
                                  <td>{{ $item->validite_payement }}</td>
                                  <td>
                                      <button class="btn btn-danger btn-sm" ><a style="text-decoration:none; color:white" href="{{route('delete-commande',$item->id)}}"><i class="bi bi-trash-fill"></i></a></button>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="row">{{$commende->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection