<?php

use App\Http\Controllers\guestController;
use App\Http\Controllers\ProduitController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// guest pages
Route::get('/','guestController@home');
Route::get('/produit/details/{id}','guestController@productdetails');
Route::get('/produit/{id}/list','guestController@shop');
Route::post('/produit/search','guestController@search');
Auth::routes();
//redirect admin && client
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard','AdminController@dashboard')->middleware('auth','admin');
Route::get('/client/dashboard','clientController@dashboard')->middleware('auth','is_active');
Route::get('/client/commandes','clientController@mescommande')->middleware('auth','is_active');
Route::get('/admin/profile','AdminController@profile')->middleware('auth','admin');
Route::post('/admin/profile/update','AdminController@updateprofile')->middleware('auth','admin');
Route::get('/client/profile','clientController@client')->middleware('auth','is_active');
Route::post('/client/profile/update','clientController@profileupdate')->middleware('auth','is_active');
Route::post('/client/store/review','clientController@addreview')->middleware('auth','is_active');
//client order
Route::post('/client/order/store','CommandeController@store')->middleware('auth','is_active');
Route::get('/client/cart','clientController@cart')->middleware('auth','is_active');
Route::get('/client/lc/{idlc}/destroy','CommandeController@lignecommandeDestroy')->middleware('auth','is_active');
Route::post('/client/checkout','clientController@checkout')->middleware('auth','is_active');
route::get('/client/bloquer','clientController@clientbloquer')->middleware('auth');
//categories
Route::get('/admin/categorie','CategorieController@index')->middleware('auth','admin');
Route::post('/admin/addcategorie','CategorieController@addcategorie')->middleware('auth','admin');
Route::get('/admin/categorie/{id}/delete','CategorieController@delete')->middleware('auth','admin');
Route::post('/admin/categorie/update','CategorieController@update')->middleware('auth','admin');
//produits
Route::get('/admin/produits','produitController@index')->middleware('auth','admin');
Route::post('/admin/addproduit','ProduitController@addproduit')->middleware('auth','admin');
Route::get('/admin/produit/{id}/delete','ProduitController@destroy')->middleware('auth','admin');
Route::post('/admin/produit/update','ProduitController@update')->middleware('auth','admin');
//clients
Route::get('/admin/client','AdminController@clients')->middleware('auth','admin');
Route::get('/admin/client/{id}/bloqueruser','AdminController@bloquerUser')->middleware('auth','admin');
Route::get('/admin/client/{id}/activeruser','AdminController@activeruser')->middleware('auth','admin');
Route::get('/admin/commandes','AdminController@commandes')->middleware('auth','admin');
Route::post('/admin/produit/search','ProduitController@searchproduit')->middleware('auth','admin');
Route::post('/admin/categorie/search','CategorieController@searchcategorie')->middleware('auth','admin');
Route::post('/admin/clients/search','AdminController@searchclient')->middleware('auth','admin');
Route::post('/admin/commandes/search','commandeController@searchcommande')->middleware('auth','admin');

//filtre price
Route::get('/products', 'ProductController@index')->name('guest.shop');
//contact page
Route::get('/contact','ContactController@contact')->middleware('auth');
Route::post('/contact/add','ContactController@store')->middleware('auth');
Route::get('/admin/contact','AdminController@index')->middleware('auth','admin');
Route::get('/admin/dashboard','AdminController@users')->middleware('auth','admin');




