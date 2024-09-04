@extends('layouts.app-client')
@section('content')
<main class="signup-form" style="padding-top: 60px;padding-bottom: 117px">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center">Information de livraison</h3>
                    <div class="card-body">
                        <form action="{{route('stripe')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label >ville:</label><br>
                                <select class="form-select" name="ville">
                                   @foreach($villes as $ville)
                                    <option value="{{$ville->nomville}}">{{$ville->nomville}}</option>
                                   @endforeach
                                </select>
                                @if ($errors->has('ville'))
                                <span class="text-danger">{{ $errors->first('ville') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                            <label >Adresse de livraison:</label><br>
                                <input type="text" placeholder="Adresse" id="adresse" class="form-control"
                                    name="adresse" required autofocus>
                                @if ($errors->has('adresse'))
                                <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Next    <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection