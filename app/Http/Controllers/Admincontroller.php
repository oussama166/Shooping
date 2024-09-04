<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\Produit;
use App\Models\User;
use App\Models\Commende;

class Admincontroller extends Controller
{

    public function users()
    {
        $users = User::simplePaginate(5);
        return view ('admin.listusers')->with('users', $users);
    }
    public function commande()
    {
        $commende = Commende::simplePaginate(5);
        return view ('admin.listcommende')->with('commende', $commende);
    }
    public function AjouterUsers()
    {
        return view('admin.Ajouter-user');
    }

    public function ajouteruser(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        User::create([
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'datenaissance' => $data['datenaissance'],
        'num' => null,
        'email' => $data['email'],
        'validadmin' => 'user',
        'password' => Hash::make($data['password'])
        ]);
        return redirect("List-Users")->withSuccess( 'Utilisateur est Ajouter!');
    }
    public function edituser($id)
    {
        $users = User::find($id);
        return view('admin.edit-user')->with('users', $users);
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'datenaissance' => 'required',
            'email' => 'required|email',
        ]);
        $users = User::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('List-Users')->withSuccess('utilisateur est bien modifier!');
    }


    public function delete($id)
    {
        User::destroy($id);
        return redirect('List-Users')->withSuccess( 'utilisateur est supprimer!');
    }
    public function produit()
    {
        $produits = Produit::simplePaginate(5);
        return view('admin.produit-admin')->with('produits', $produits);
    }
    public function Ajouterproduits()
    {
        return view('admin.Ajouter-produits');
    }

    public function Ajouterproduit(Request $request)
    {
        if($request->reduction=='oui'){
            $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'prix' => 'required',
                'details' => 'required',
                'quantité' => 'required',
                'photoprofil' => 'required',
                'photo' => 'required',
                'new_prix'=>'required',
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
            return redirect(route('produit-admin'))->withSuccess( 'Produit est Ajouter!');
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
            return redirect(route('produit-admin'))->withSuccess( 'Produit est Ajouter!');
        }
    }
    public function editproduit($id)
    {
        $produits = Produit::find($id);
        return view('admin.edit-produit')->with('produits', $produits);
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
            ]);
            $produits = Produit::find($id);
            // take the old price
            $old_prix = $produits->prix;
            // check if the price is less than the old price
            if($old_prix < $request->new_prix){
                return redirect()->back()->withSuccess('Le prix de produit '.$produits->nom.' est plus que le prix de produit que vous avez entrer! entrez un prix moins que '.$old_prix);
            }

            $input = [
                'nom' => $request->nom,
                'classe' => $request->classe,
                'prix' => $request->prix,
                'reduction' => $request->reduction,
                'new_prix' => $request->new_prix,
                'details' => $request->details,
                'quantité' => $request->quantité,
            ];
            if($request->hasFile('photoprofil')) {
                $request->validate([
                    'photoprofil' => 'required',
                ]);
                $file_name1 = $this->savephoto($request->photoprofil, 'images/produit-profil');
                $input['photoprofil'] = $file_name1;
            }
            if($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required',
                ]);
                $file_name2 = $this->savephoto($request->photo, 'images/produit');
                $input['photo'] = $file_name2;
            }
            $produits->update($input);
            return redirect(route('produit-admin'))->withSuccess('produit est bien modifier!');
        } else {
            $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'prix' => 'required',
                'details' => 'required',
                'quantité' => 'required',
            ]);
            $produits = Produit::find($id);
            $input = [
                'nom' => $request->nom,
                'classe' => $request->classe,
                'prix' => $request->prix,
                'reduction' => $request->reduction,
                'new_prix' => null,
                'details' => $request->details,
                'quantité' => $request->quantité,
            ];
            if($request->hasFile('photoprofil')) {
                $request->validate([
                    'photoprofil' => 'required',
                ]);
                $file_name1 = $this->savephoto($request->photoprofil, 'images/produit-profil');
                $input['photoprofil'] = $file_name1;
            }
            if($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required',
                ]);
                $file_name2 = $this->savephoto($request->photo, 'images/produit');
                $input['photo'] = $file_name2;
            }
            $produits->update($input);
            return redirect(route('produit-admin'))->withSuccess('produit est bien modifier!');
        }
    }


    public function deleteproduit($id)
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
        return redirect(route('produit-admin'))->withSuccess( 'produit est supprimer!');
    }
    public function deletecommande($id)
    {
        $commende = Commende::find($id);
        $commende->delete();
        return redirect(route('commande'))->withSuccess( 'Commande est supprimer!');
    }
    protected function savephoto($photo,$folder){
        $file_extension =$photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path1 = $folder;
        $photo->move($path1,$file_name);
        return $file_name;
    }

}
