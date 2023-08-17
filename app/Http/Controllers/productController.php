<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produit;
use App\categorie;
class productController extends Controller
{
    public function index(Request $request)
{
    $categories=categorie::all();
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $produits = Produit::when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })
        ->get();

    return view('guest.shop', compact('produits'))->with('categories',$categories)->with('produits',$produits);
}

}
