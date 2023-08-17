<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;
use App\produit;
class guestController extends Controller
{
    public function home(){
        $produits=produit::all();
        $categories=categorie::all();
        return view('guest.home')->with('produits',$produits)->with('categories',$categories);
    }
    //details produit
    public function productdetails($id){
        $categories=categorie::all();
        $produit=produit::find($id);
        $produits=produit::where('id','!=',$id)->get();
        return view('guest.product-details')->with('categories',$categories)->with('produit',$produit)->with('produits',$produits);
    }
    //produit par categorie
    public function shop($idcategory){
        $categorie=categorie::find($idcategory);
        $categories=categorie::all();
        $produits=$categorie->produits;
        return view('guest.shop')->with('categories',$categories)->with('produits',$produits);
    }
    //search  function
    public function search(Request $request){
      $produits=produit::where('nom','LIKE','%'.$request->keywords .'%')->get();
  $categories=categorie::all();
  return view('guest.shop')->with('produits',$produits)->with('categories',$categories);
    }


}
