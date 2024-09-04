@extends('layouts.app-client')
    
@section('content')
<main class="container">
  <div class="p-5 p-md-5 mb-5 rounded " style ='background-color:#292625;'>
    <div class="  text-light text-center">
    <img class="bd-placeholder-img  rounded" width="120" height="120" src="{{asset('images/client/pc-portable.jpg')}}"><br><br>
      <h2 class=" fst-italic">Pc Portable</h2>
    </div>
  </div>
    <div class="row row-cols-1 row-cols-sm-6 row-cols-md-4 g-4">
        @foreach($produits as $produit)
          @if(($produit->reduction)=='oui')
            @php $pourcentage=(int)(100-(( $produit->new_prix*100)/ $produit->prix))  @endphp
            <div class="col ">
                <div class="card shadow-sm">
                  <div class="onsale position-absolute top-0 start-0 rounded" style="background: #000;font-size: 12px;padding:5px 8px">
                    <span class="badge "><i class="bi bi-arrow-down"></i> {{$pourcentage}}%</span>
                  </div>
                    <img class="bd-placeholder-img" width="100%" height="200" src="{{asset('images/produit-profil/'.$produit->photoprofil)}}">
                    <div class="card-body ">
                    <h4>{{ $produit->nom }}</h4>
                    <p class="position-relative" style="left: 10px"><del>{{ $produit->prix }}€</del> <strong>{{ $produit->new_prix }}€</strong></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{ route('add_to_cart', $produit->code) }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="bi bi-cart-plus-fill"></i></i></a>
                          <a href="{{route('Show-cart',$produit->code)}}" class="btn btn-sm btn-outline-secondary" role="button"><i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col ">
                <div class="card shadow-sm">
                    <img class="bd-placeholder-img" width="100%" height="200" src="{{asset('images/produit-profil/'.$produit->photoprofil)}}">
                    <div class="card-body ">
                    <h4>{{ $produit->nom }}</h4>
                    <p class="position-relative" style="left: 10px"><strong>{{ $produit->prix }}€</strong></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{ route('add_to_cart', $produit->code) }}" class="btn btn-sm btn-outline-secondary" role="button"><i class="bi bi-cart-plus-fill"></i></a>
                          <a href="{{route('Show-cart',$produit->code)}}" class="btn btn-sm btn-outline-secondary" role="button"><i class="bi bi-eye-fill"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          @endif
        @endforeach
    </div>
</main>
<hr>
@endsection