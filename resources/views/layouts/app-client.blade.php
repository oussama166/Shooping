<html lang="en"><head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{asset('images/client/icon.jpg')}}">
    <title>SOFTWARE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
  <body>
                        <header class="blog-header bg-success lh-1 py-3">
                            <div class="container">
                            <div class="row flex-nowrap justify-content-between align-items-center">
                            <div class="col-4 pt-1" >
                                <div class="container">
                                <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="dropdown">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="fa fa-shopping-cart text-light" aria-hidden="true"><span class="badge badge-pill">{{ count((array) session('cart')) }}</span></i>
                                                </button>
                                                    
                                                <div class="dropdown-menu">
                                                    <div class="row total-header-section">
                                                        @php $total = 0 @endphp
                                                        @foreach((array) session('cart') as $id => $details)
                                                            @php $total += $details['prix'] * $details['quantité'] @endphp
                                                        @endforeach
                                                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                            <p>Total: <span class="text-info">{{ $total }}€</span></p>
                                                        </div>
                                                    </div>
                                                    @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                        <div class="row cart-detail">
                                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                                <img width="70" height="60" class="img-responsive" src="{{ asset('images/produit-profil/'.$details['photoprofil'])}}" />
                                                            </div>
                                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                                <p>{{ $details['nom'] }}</p>
                                                                <span class="price text-info"> {{ $details['prix'] }}€</span> <span class="count"> Quantité:{{ $details['quantité'] }}</span>
                                                            </div>
                                                        </div>
                                                            <br>
                                                    @endforeach
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                            <a href="{{ route('cart') }}" class="btn btn-secondary btn-block">Afficher tout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <a class="blog-header-logo text-light" href="#" style="text-decoration:none">SOFTWARE</a>
                            </div>
                            @guest
                            <div class="col-4 d-flex justify-content-end align-items-center" >
                                <a class="btn btn-sm btn-light text-dark" href="{{ route('login') }}">Connecter</a>
                            </div>
                            @else
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <a class="btn btn-sm btn-light text-dark" href="{{ route('signout') }}">Déconnecter</a>
                            </div>
                            @endguest
                            </div>
                        </header>
                        <div class="nav-scroller py-1 mb-2">
                            <nav class="nav d-flex justify-content-between">
                            <a></a>
                            <a ></a>
                            <a ></a>
                            <a class="p-2 link-secondary" href="{{route('home')}}" style="text-decoration:none">Accueil</a>
                            <a class="p-2 link-secondary" href="{{route('all')}}" style="text-decoration:none">All</a>
                            <a class="p-2 link-secondary" href="{{route('pc')}}" style="text-decoration:none">Pc Bureau</a>
                            <a class="p-2 link-secondary" href="{{route('pc-portable')}}" style="text-decoration:none">Pc Portable</a>
                            <a class="p-2 link-secondary" href="{{route('ecran')}}" style="text-decoration:none">Écran</a>
                            <a class="p-2 link-secondary" href="{{route('accessoire')}}" style="text-decoration:none">Accessoire PC</a>
                            <a ></a>
                            <a ></a>
                            <a></a>
                            </nav>
                        </div>
                        </div>
    <div class="container">
   
   @if(session('success'))
       <div class="alert alert-success">
         {{ session('success') }}
       </div> 
   @endif 
  <div>
   @yield('content')
</div>
</div>

@extends('layouts.footer')
@yield('scripts')
</body>
</html>