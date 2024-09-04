
@extends('layouts.app-client')
    
@section('content')
<div id="myCarousel" class="carousel slide  " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner rounded">
      <div class="carousel-item active">
      <img class="bd-placeholder-img  " width="100%" height="60%"  src="{{asset('images/client/samsung-tv-adaptation-pc.jpg')}}">
      <div class="container">
          <div class="carousel-caption">
            <p><a class="btn btn-md btn-primary" style='border-Radius:30px;' href="{{route('ecran')}}"  >Voir plus</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
      <img class="bd-placeholder-img " width="100%" height="60%"  src="{{asset('images/client/logitech-G502-hero.jpg')}}">
        <div class="container">
          <div class="carousel-caption">
            <h1>Logitech G502 HERO <strong>-30%</strong></h1>
            <p>Souris de jeu filaire haute performance.</p>
            <p><a class="btn btn-sm btn-secondary" style='border-Radius:20px;' href="{{route('accessoire')}}">Voir plus</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img  " width="100%" height="60%"  src="{{asset('images/client/razer.jpg')}}">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Razer Nari Ultime <strong>-46%</strong></h1>
            <p>Casque de jeu sans fil avec son surround 7.1</p>
            <p><a class="btn btn-sm btn-secondary" style='border-Radius:20px;' href="{{route('accessoire')}}">Voir Plus</a></p>
          </div>
        </div>
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
  </div><br><br>


 
<h3 class="text-center fst-italic"><strong>Toutes Catégories</strong></h3>
  <div class="container marketing">

    
    <div class="row">
      <div class="col-lg-3">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('images/client/pc.jpg')}}"><br>
        <h2 class="fw-normal">Pc Bureau</h2><br>
        <p><a class="btn btn-secondary" href="{{route('pc')}}">J'achéte</a></p>
      </div>
      <div class="col-lg-3">
      <img class="bd-placeholder-img  rounded"  src="{{asset('images/client/pc-portable.jpg')}}"><br>
        <h2 class="fw-normal">Pc Portable</h2><br>
        <p><a class="btn btn-secondary" href="{{route('pc-portable')}}">J'achéte</a></p>
      </div>
      <div class="col-lg-3">
      <img class="bd-placeholder-img  rounded" width="140" height="140" src="{{asset('images/client/ecran.jpg')}}"><br>
        <h2 class="fw-normal">Écran</h2><br>
        <p><a class="btn btn-secondary" href="{{route('ecran')}}">J'achéte</a></p>
      </div>
      <div class="col-lg-3">
      <img class="bd-placeholder-img  rounded " style ='background-color:#FFFFFF;' width="140" height="140" src="{{asset('images/client/Accessoire.jpg')}}"><br>        
      <h2 class="fw-normal">Accessoire</h2><br>
        <p><a class="btn btn-secondary" href="{{route('accessoire')}}">J'achéte</a></p>
      </div>
    </div>
  </div>
<hr>
@endsection


