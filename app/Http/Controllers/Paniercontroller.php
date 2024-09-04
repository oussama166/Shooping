<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit; 

class Paniercontroller extends Controller
{ 
    public function showcart($id)
    {  
        $produits = Produit::find($id);
        return view('client.show-cart')->with('produits', $produits);
    }
    public function cart()
    {
        return view('client.cart');
    }
    
    public function addToCart($id)
    {
        $product = Produit::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if($product->reduction == 'oui'){
            if(isset($cart[$id])) {
                $cart[$id]['quantité']++;
            }  else {
                $cart[$id] = [
                    "id"=>$product->code,
                    "nom" => $product->nom,
                    "photoprofil" => $product->photoprofil,
                    "prix" => $product->new_prix,
                    "quantité" => 1
                ];
            }
        }else{
            if(isset($cart[$id])) {
                $cart[$id]['quantité']++;
            }  else {
                $cart[$id] = [
                    "id"=>$product->code,
                    "nom" => $product->nom,
                    "photoprofil" => $product->photoprofil,
                    "prix" => $product->prix,
                    "quantité" => 1
                ];
            }
        }
 
        session()->put('cart', $cart);
        return redirect()->back();
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantité){
            $cart = session()->get('cart');
            $cart[$request->id]["quantité"] = $request->quantité;
            session()->put('cart', $cart);
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
}

