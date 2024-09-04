<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
class Produitcontroller extends Controller
{
    public function produit()
    {
        $produits = Produit::simplePaginate(5);
        return view('users.produit-user')->with('produits', $produits);
    }
    public function Ajouterproduits()
    {
        return view('users.Ajouter-produits');
    }

    public function Ajouterproduit(Request $request)
    {
        if($request->reduction=='oui'){
            $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'prix' => 'required',
                'new_prix'=>'required',
                'details' => 'required',
                'quantité' => 'required',
                'photoprofil' => 'required',
                'photo' => 'required',
            ]);
            $file_name1 = $this->savephoto($request->photoprofil,folder:'images/produit-profil') ;
            $file_name2 = $this->savephoto($request->photo,folder:'images/produit') ;
            Produit::create([
            'nom' => $request->nom,
            'classe' => $request->classe,
            'prix' => $request->prix,
            'reduction' => $request->reduction,
            'new_prix' => $request->new_prix,
            'details' => $request->details,
            'quantité' => $request->quantité,
            'photoprofil' =>$file_name1,
            'photo' => $file_name2,
            ]);
            return redirect(route('produit-user'))->withSuccess( 'Produit est Ajouter!');
        }else{
            $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'prix' => 'required',
                'details' => 'required',
                'quantité' => 'required',
                'photoprofil' => 'required',
                'photo' => 'required',
            ]);
            $file_name1 = $this->savephoto($request->photoprofil,folder:'images/produit-profil') ;
            $file_name2 = $this->savephoto($request->photo,folder:'images/produit') ;
            Produit::create([
            'nom' => $request->nom,
            'classe' => $request->classe,
            'prix' => $request->prix,
            'reduction' => $request->reduction,
            'details' => $request->details,
            'quantité' => $request->quantité,
            'photoprofil' =>$file_name1,
            'photo' => $file_name2,
            ]);
            return redirect(route('produit-user'))->withSuccess( 'Produit est Ajouter!');
        }
    }
    public function editproduit($id)
    {
        $produits = Produit::find($id);
        return view('users.edit-produit')->with('produits', $produits);
    }

    public function updateproduit(Request $request, $id)
    {
        if($request->reduction=='oui'){
            $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'prix' => 'required',
                'new_prix'=>'required',
                'details' => 'required',
                'quantité' => 'required',
                'photoprofil' => 'required',
                'photo' => 'required',
            ]);
            $file_name1 = $this->savephoto($request->photoprofil,folder:'images/produit-profil') ;
            $file_name2 = $this->savephoto($request->photo,folder:'images/produit') ;
            $produits = Produit::find($id);
            $input =[
                'nom' => $request->nom,
                'classe' => $request->classe,
                'prix' => $request->prix,
                'reduction' => $request->reduction,
                'new_prix' => $request->new_prix,
                'details' => $request->details,
                'quantité' => $request->quantité,
                'photoprofil' =>$file_name1,
                'photo' => $file_name2,
                ];
            $produits->update($input);
            return redirect(route('produit-user'))->withSuccess( 'produit est bien modifier!');
        }else{
        $request->validate([
            'nom' => 'required',
            'classe' => 'required',
            'prix' => 'required',
            'details' => 'required',
            'quantité' => 'required',
            'photoprofil' => 'required',
            'photo' => 'required',
        ]);
        $file_name1 = $this->savephoto($request->photoprofil,folder:'images/produit-profil') ;
        $file_name2 = $this->savephoto($request->photo,folder:'images/produit') ;
        $produits = Produit::find($id);
        $input =[
            'nom' => $request->nom,
            'classe' => $request->classe,
            'prix' => $request->prix,
            'reduction' => $request->reduction,
            'new_prix' =>null,
            'details' => $request->details,
            'quantité' => $request->quantité,
            'photoprofil' =>$file_name1,
            'photo' => $file_name2,
            ];
        $produits->update($input);
        return redirect(route('produit-user'))->withSuccess('produit est bien modifier!');
        }
    }


    public function delete($id)
    {
        $produits = Produit::find($id);
        $photoprofil=$produits->photoprofil;
        $photo=$produits->photo;
        if($photoprofil){
            unlink('images/produit-profil'.'/'.$photoprofil);
        }
        if($photo){
            unlink('images/produit'.'/'.$photo);
        }
        $produits->delete();
        return redirect(route('produit-user'))->withSuccess( 'produit est supprimer!');
    }
    protected function savephoto($photo,$folder){
        $file_extension =$photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path1 = $folder;
        $photo->move($path1,$file_name);
        return $file_name;
    }
}
