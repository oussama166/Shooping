@extends('layouts.app-client')
   
@section('content')
<div style="padding-top: 20px;padding-bottom: 284px">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">produit</th>
                <th style="width:10%">Prix</th>
                <th style="width:8%">Quantité</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['prix'] * $details['quantité'] @endphp
                    @php $prix_produit = $details['prix'] * $details['quantité'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="produit">
                            <div class="row">  
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/produit-profil/'.$details['photoprofil'])}}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['nom'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="prix">{{ $details['prix'] }}€</td>
                        <td data-th="quantité" >
                            <input  type="number" value="{{$details['quantité']}}" class="form-control quantité cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$prix_produit}}€</td>
                        <td class="actions" data-th="">
                            <button class="btn  btn-sm btn-danger cart_remove"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" ><h3 class="d-flex justify-content-end"><strong>Total:{{ $total }}€</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('commende')}}"><button class="btn btn-secondary"><i class="fa fa-money"></i> Payer</button></a>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
   
@section('scripts')

<script type="text/javascript">
   
    $(".cart_update").change(function(e){
            e.preventDefault();
            var ele = $(this);
        $.ajax({
            url: '{{ route("update_cart") }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantité: ele.parents("tr").find(".quantité").val()
            },
                success: function (response) {
                    window.location.reload();
                }
           
        });
    });
   
    $(".cart_remove").click(function(e){
        e.preventDefault();
        var ele = $(this);
        if(confirm("Voulez-vous vraiment supprimer?")) {
            $.ajax({
                url: "{{ route('remove_from_cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection