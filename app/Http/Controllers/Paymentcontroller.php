<?php /** @noinspection ALL */

namespace App\Http\Controllers;
use App\Models\Ville;
use App\Models\Produit;
use App\Models\Commende;
use Illuminate\Http\Request;

class Paymentcontroller extends Controller
{
    public function commende(){
        $cart = session()->get('cart');
        if(isset($cart)){
            foreach($cart as $data){
                $datas=$data;
                $produits = Produit::find($data['id']);
                if(($produits->quantité)==0){
                    return redirect()->back()->withSuccess('Ce produit '.$data['nom'].' est en rupture de stock.');
                }
                if(($produits->quantité)<$data['quantité']){
                    return redirect()->back()->withSuccess('La quantité de produit '.$data['nom'].' que vous commandez est plus que ce qui est en stock! commandez moins de set quantité'.' '.$produits->quantité);
                }
            }
        }
        if(!isset($datas)){
            return redirect()->back()->withSuccess('Le panier est vide');
        }
        $villes = Ville::all();
        return view('client.commende')->with('villes', $villes);
    }
    public function stripe(Request $request)
    {
    try {
        $villes= Ville::where('nomville',$request->ville)->first();
        $cart = session()->get('cart');
        $prix=0;
        foreach($cart as $data){
            $prix =$prix + ($data['prix']*$data['quantité']);
        }
        $id=0;
        foreach($cart as $data){
            $produits[$id]= [
                'id_produit'=>$data['id'],
                'quantite_commender'=>$data['quantité'],
            ];
            $id= $id+1 ;
        }
        $prix_commende=($prix+$villes->prixlivraison);
        $client=auth()->user()->id;
        $request->validate([
            'ville' => 'required',
            'adresse' => 'required',
        ]);
        $id_commende=$client.time().$prix_commende;
            \Stripe\Stripe::setApiKey("sk_test_51Pc8v7FWzrSXEkJ8cYyu9E9OwkFziSmn8ghCBhjbnZk7wvxs3mZiK2OI05vuwL4zknpSMVtWjFlqLllvfrUttoaY00WAaGAmaN");
            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'eur',
                            'product_data' => [
                                'name' => 'prix Total de produit',
                            ],
                            'unit_amount'  =>$prix*100,
                        ],
                        'quantity'   =>1,
                    ],
                    [
                        'price_data' => [
                            'currency'     => 'eur',
                            'product_data' => [
                                'name' => 'prix livraison',
                            ],
                            'unit_amount'  =>($villes->prixlivraison)*100,
                        ],
                        'quantity'   =>1,
                    ],
                ],
                'mode'        => 'payment',
                'success_url' => route('success',$id_commende),
                'cancel_url'  => route('cart'),
            ]);
            Commende::create([
                'id_client'=> $client,
                'id_commende'=>$id_commende ,
                'produits'=>json_encode($produits),
                'ville' =>$request->ville,
                'adresse' =>$request->adresse,
                'prix_commende_total'=>$prix_commende.'€',
                'validite_payement'=>'non-payer',
            ]);
        }catch(\Exception){
            return "S'il vous plaît, vérifiez votre connexion à internet et réessayez." ;
        }

        return redirect()->away($session->url);
    }

    public function success($id)
    {
        $commende= Commende::where('id_commende',$id)->first();
        $commende->update([
            'validite_payement'=>'payer',
        ]);
        $cart = session()->get('cart');
        foreach($cart as $data){
            $produit= Produit::where('code',$data['id'])->first();
            $produit->update([
                'quantité'=>(($produit->quantité)-$data['quantité']),
            ]);
        }
        return  redirect()->route('cart')->withSuccess('Succés de paiement');
    }
}
