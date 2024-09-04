@extends('layouts.app')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h3 class="card-header text-center">Modifier Produit</h3>
                    <div class="card-body">
                        <form action="{{ route('update-produit',$produits->code) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                            <label >Nom Produit:</label><br>
                                <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom"
                                   value="{{$produits->nom}}" required autofocus>
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Prix:</label><br>
                                <input type="text" placeholder="Prix" id="prix" class="form-control"
                                value="{{$produits->prix}}"  name="prix" required autofocus>
                                @if ($errors->has('prix'))
                                <span class="text-danger">{{ $errors->first('prix') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Quantité:</label><br>
                                <input type="text" placeholder="Quantité" id="quantité" class="form-control"
                                value="{{$produits->quantité}}" name="quantité" required autofocus>
                                @if ($errors->has('quantité'))
                                <span class="text-danger">{{ $errors->first('quantité') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Détails:</label><br>
                                <input type="text" placeholder="Détails" id="details" class="form-control"
                                value="{{$produits->details}}"  name="details" required autofocus>
                                @if ($errors->has('details'))
                                <span class="text-danger">{{ $errors->first('details') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Photo Profil Produit:</label><br>
                                <input type="file" id="photoprofil" class="form-control"
                                  name="photoprofil" required autofocus>
                                  <img  style="width: 70px ;height: 70px" src="{{asset('images/produit-profil/'.$produits->photoprofil)}}">
                                @if ($errors->has('photoprofil'))
                                <span class="text-danger">{{ $errors->first('photoprofil') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Photo-2:</label><br>
                                <input type="file" id="photo" class="form-control"
                                value="{{$produits->photo}}" name="photo" required autofocus>
                                <img  style="width: 70px ;height: 70px" src="{{asset('images/produit/'.$produits->photo)}}">
                                @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label >Classe:</label><br>
                                    <select class="form-control"name="classe" value="{{$produits->classe}}" >
                                        <option value="pc">Pc</option>
                                        <option value="pc-portable">Pc-Portable</option>
                                        <option value="écran">Écran</option>
                                        <option value="accessoire" >Accessoire</option>
                                    </select>
                                @if ($errors->has('classe'))
                                <span class="text-danger">{{ $errors->first('classe') }}</span>
                                @endif
                            </div>
                                <label >Il y a une réduction ?:</label><br>
                                        <select class="form-control"name="reduction">
                                            <option value="non" >non</option>
                                            <option value="oui" >oui</option>
                                        </select><br>
                                <div class="form-group mb-3 oui msg" id="div_cacher" style="display:none">
                                    <label >Nouveau Prix:</label><br>
                                    <input type="text" value="{{$produits->new_prix}}" id="new_prix" placeholder="Nouveau Prix" class="form-control"
                                        name="new_prix" >
                                    @if ($errors->has('new_prix'))
                                    <span class="text-danger">{{ $errors->first('new_prix') }}</span>
                                    @endif
                                </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var val = $(this).attr("value");
                if(val=='oui'){
                    $("." + val).show();
                }if(val=='non'){
                    $(".oui").hide();
                }
            });
        }).change();
    });
    </script>
@endsection