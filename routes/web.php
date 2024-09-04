<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Produitcontroller;
use App\Http\Controllers\Clientbackendcontroller;
use App\Http\Controllers\clientfrontcontroller;
use App\Http\Controllers\Paniercontroller;
use App\Http\Controllers\Paymentcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('All', [clientfrontcontroller::class, 'all'])->name('all');
Route::get('/', [clientfrontcontroller::class, 'home'])->name('home');
Route::get('Accessoire', [clientfrontcontroller::class, 'accessoire'])->name('accessoire');
Route::get('Pc-Bureau', [clientfrontcontroller::class, 'pc'])->name('pc');
Route::get('Pc-Portable', [clientfrontcontroller::class, 'pcportable'])->name('pc-portable');
Route::get('ecran', [clientfrontcontroller::class, 'ecran'])->name('ecran');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('inscription', [Clientbackendcontroller::class, 'inscriptionclient'])->name('inscription');
Route::post('registration-client', [Clientbackendcontroller::class, 'registrationclient'])->name('register.client'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('admin', [CustomAuthController::class, 'admin'])->name('admin');

Route::group(['middleware'=>'authadmin'],function(){
    Route::get('clients', [Clientbackendcontroller::class, 'clients'])->name('clients');
    Route::get('List-Users', [Admincontroller::class, 'users'])->name('List-Users');
    Route::get('Commande', [Admincontroller::class, 'commande'])->name('commande');
    Route::get('edit-user/{id}', [Admincontroller::class, 'edituser'])->name('edit-user');
    Route::post('update-user/{id}', [Admincontroller::class, 'updateuser'])->name('update-user');
    Route::get('Ajouter-Users', [Admincontroller::class, 'AjouterUsers'])->name('Ajouter-Users');
    Route::post('Ajouter-user', [Admincontroller::class, 'ajouteruser'])->name('Ajouter-user');
    Route::get('delete-user/{id}', [Admincontroller::class, 'delete'])->name('delete-user');
    Route::get('produit-admin', [Admincontroller::class, 'produit'])->name('produit-admin');
    Route::get('edit-produit-admin/{id}', [Admincontroller::class, 'editproduit'])->name('edit-produit-admin');
    Route::post('update-produit-admin/{id}', [Admincontroller::class, 'updateproduit'])->name('update-produit-admin');
    Route::post('Ajouter-produit-admin', [Admincontroller::class, 'Ajouterproduit'])->name('Ajouter-produit-admin');
    Route::get('Ajouter-produits-admin', [Admincontroller::class, 'Ajouterproduits'])->name('Ajouter-produits-admin');
    Route::get('delete-produit-admin/{id}', [Admincontroller::class, 'deleteproduit'])->name('delete-produit-admin');
    Route::get('delete-client/{id}', [Clientbackendcontroller::class, 'deleteclient'])->name('delete-client');
    Route::get('delete-commande/{id}', [Admincontroller::class, 'deletecommande'])->name('delete-commande');  
});
Route::group(['middleware'=>'user'],function(){
    Route::get('produit', [Produitcontroller::class, 'produit'])->name('produit-user');
    Route::get('edit-produit/{id}', [Produitcontroller::class, 'editproduit'])->name('edit-produit');
    Route::post('update-produit/{id}', [Produitcontroller::class, 'updateproduit'])->name('update-produit');
    Route::post('Ajouter-produit', [Produitcontroller::class, 'Ajouterproduit'])->name('Ajouter-produit');
    Route::get('Ajouter-produits', [Produitcontroller::class, 'Ajouterproduits'])->name('Ajouter-produits');
    Route::get('delete-produit/{id}', [Produitcontroller::class, 'delete'])->name('delete-produit'); 
});



Route::get('vue-produit/{id}', [Paniercontroller::class, 'showcart'])->name('Show-cart');
Route::get('panier', [Paniercontroller::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [Paniercontroller::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [Paniercontroller::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [Paniercontroller::class, 'remove'])->name('remove_from_cart');
Route::get('mot-passe-oublier',[CustomAuthController::class,'getForgetPassword'])->name('getForgetPassword');
Route::post('forget-password',[CustomAuthController::class,'postForgetPassword'])->name('postForgetPassword');
Route::get('reset-password/{reset_code}',[CustomAuthController::class,'getResetPassword'])->name('getResetPassword');
Route::post('reset-password/{reset_code}',[CustomAuthController::class,'postResetPassword'])->name('postResetPassword');



Route::group(['middleware'=>'authclient'],function(){
    Route::get('info-livraison', [Paymentcontroller::class, 'commende'])->name('commende');
    Route::post('payement', [Paymentcontroller::class , 'stripe'])->name('stripe');
    Route::get('/success/{id}',[Paymentcontroller::class , 'success'])->name('success');
});