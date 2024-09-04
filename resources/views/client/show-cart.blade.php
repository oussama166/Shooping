@extends('layouts.app-client')
    
@section('content')

<div class="row featurette"  style="padding-top:80px; padding-bottom:  88px;">
    @if(($produits->reduction)=='oui')
    @php $pourcentage=(int)(100-(( $produits->new_prix*100)/ $produits->prix))  @endphp
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1"><span class="text-muted">{{ $produits->nom }} <strong>-{{$pourcentage}}%</strong></span></h2>
        <p class="lead">{{ $produits->details }}</p><br>
        <p class="lead "><del>{{ $produits->prix }}€</del> <strong>{{ $produits->new_prix }}€</strong></p>
        @else
        <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1"><span class="text-muted">{{ $produits->nom }}</span></h2>
        <p class="lead">{{ $produits->details }}</p><br>
            <p class="lead "><strong>{{ $produits->prix }}€</strong></p>
        @endif
        <br>
        <a href="{{ route('add_to_cart', $produits->code) }}" class="btn btn-md btn-secondary d-grid gap-2" role="button">Ajouter au panier</a>
      </div>
      <div class="col-md-5 order-md-1">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bd-placeholder-img" width="450" height="300" src="{{asset('images/produit-profil/'.$produits->photoprofil)}}">
                </div>
                <div class="carousel-item">
                    <img class="bd-placeholder-img" width="450" height="300" src="{{asset('images/produit/'.$produits->photo)}}">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
      </div>
    </div>
@endsection