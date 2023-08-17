<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use App\review;
use App\categorie;
use App\commande;
use App\produit;
use Whoops\Run;

class clientController extends Controller
{
    public function dashboard(){
        return view('client.dashboard');
    }
    public function client(){
        return view('client.profile');
    }
    //update profile client
    public function profileupdate(Request $request){
        Auth::user()->name=$request->name;
        Auth::user()->email=$request->email;
        if ($request->password) {
            Auth::user()->password=Hash::make($request->password);
        }
        Auth::user()->update();
        return redirect('/client/profile')->with('success','changement effectueé avec success');
    }
    //post review
    public function addreview(Request $request){
        $request->validate([
            'rate'=>'required',
            'content'=>'required',
        ]);
        $reviews=new review();
        $reviews->rate=$request->rate;
        $reviews->content=$request->content;
        $reviews->produit_id=$request->produit_id;
        $reviews->user_id=Auth::user()->id;
        if($reviews->save()){
            return redirect()->back();
        }

    }
    public function cart(){
        $produits=produit::all();
        $categories=categorie::all();
        $commandes=commande::where('client_id',Auth::user()->id)->where('etat','en_cours')->first();
        return view('guest.cart')->with('categories',$categories)->with('commandes',$commandes)->with('produits',$produits);
    }

    //checkout
    public function checkout(Request $request){
       $commandes=commande::find($request->commande);
       $commandes->etat="payee";
       $commandes->update();
       return redirect('/client/dashboard')->with('success','commande payee avec success');
    }
    public function mescommande(){

        return view('client.commande');
    }
    public function clientbloquer(){
        return view('client.clientbloquer');
    }

}
