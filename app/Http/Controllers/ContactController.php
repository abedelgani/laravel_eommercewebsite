<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorie;
use App\produit;
use App\contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function contact(){
        $categories=categorie::all();
        $produits=produit::all();
        return view('guest.contact')->with('categories',$categories)->with('produits',$produits);
    }
   public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'objet'=>'required',
            'message'=>'required',
            'email'=>'required',
        ]);
        $contacts=new contact();
        $contacts->name=$request->name;
        $contacts->objet=$request->objet;
        $contacts->message=$request->message;
        $contacts->user_id=Auth::user()->id;
        $contacts->email=$request->email;
        if ($contacts->save()) {
           return redirect('/contact')->with('success','votre message envoyer avec success');
        }

    }
}
