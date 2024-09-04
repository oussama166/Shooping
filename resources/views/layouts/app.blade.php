<html lang="en"><head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{asset('images/client/icon.jpg')}}">
    <title>SOFTWARE</title>
    <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
  <body>
                        <header class="blog-header bg-dark lh-1 py-3">
                          <div class="container">
                            <div class="row flex-nowrap justify-content-between align-items-center">
                                <div class="col-4 pt-1 text">
                                    <a class="link-secondary text-light" style="text-decoration:none" href="#">SOFTWARE</a>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                    <a class="btn btn-sm btn-outline-secondary text-light" href="{{route('signout')}}">Déconnecter</a>
                                </div>
                                </div>
                          </div>
                        </header>
                    <div class="container">
                        <div class="nav-scroller py-1 mb-2">
                            <nav class="nav d-flex justify-content-between">
                            <a ></a>
                            <a ></a>
                            <a ></a>
                            <a class="p-2 link-secondary" href="{{route('produit-user')}}" style="text-decoration:none">Produits</a>
                            <a></a>
                            <a class="p-2 link-secondary" href="{{route('Ajouter-produits')}}" style="text-decoration:none">Ajouter-Produit</a>
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
  
   @yield('content')
</div>
</main>
@yield('scripts')
    </body>
</html>