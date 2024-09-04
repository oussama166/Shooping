<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;

class clientfrontcontroller extends Controller
{
    public function all()
    {
        $produits = Produit::all();
        return view ('client.all')->with('produits', $produits);
    }
    public function home()
    {
        return view ('client.home');
    }
    public function pc()
    {
        $produits = Produit::all()->where('classe','pc');
        return view ('client.pc')->with('produits', $produits);
    }
    public function accessoire()
    {
        $produits = Produit::all()->where('classe','accessoire');
        return view ('client.accessoire')->with('produits', $produits);
    }
    public function pcportable()
    {
        $produits = Produit::all()->where('classe','pc-portable');
        return view ('client.pc-portable')->with('produits', $produits);
    }
    public function ecran()
    {
        $produits = Produit::all()->where('classe','écran');
        return view ('client.ecran')->with('produits', $produits);
    }
}
