<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produit;
use App\categorie;
class ProduitController extends Controller
{
    public function index(){
        $produits=produit::all();
        $categories=categorie::all();
        return view('admin.produits.index')->with('produits',$produits)->with('categories',$categories);
    }
    public function addproduit(Request $request){
        $produits=new produit();
        $produits->nom=$request->nom;
        $produits->categorie_id=$request->categorie;
        $produits->description=$request->description;
        $produits->price=$request->price;
        $produits->qte=$request->qte;

        $newname=uniqid();
        $image=$request->file('photo');
        $newname.=".". $image->getClientOriginalExtension();
        $destinationpath='uploads';
        $image->move($destinationpath,$newname);
        $produits->photo=$newname;
        if($produits->save()){
            return redirect('/admin/produits')->with('success','produit ajouter avec success');
        }else{
            echo"error";
        }
    }
    public function destroy($id){
        $produits=produit::find($id);
        $file_path=public_path().'/uploads/'.$produits->photo;
        unlink($file_path);
        if($produits->delete()){
            return redirect('/admin/produits')->with('error','produit supprimer avec success');
        }else{
            return "error";
        }
    }
    public function update(Request $request){
        $produits= produit::find($request->idproduit);

        $produits->nom=$request->nom;
        $produits->categorie_id=$request->categorie;
        $produits->description=$request->description;
        $produits->price=$request->price;
        $produits->qte=$request->qte;
        if($request->file('photo')){
            //supprimer ancienne photo
            $file_path=public_path().'/uploads/'.$produits->photo;
            unlink($file_path);
            $newname=uniqid();
            $image=$request->file('photo');
            $newname.=".". $image->getClientOriginalExtension();
            $destinationpath='uploads';
            $image->move($destinationpath,$newname);
            $produits->photo = $newname;

        }
        if($produits->update()){
            return redirect('/admin/produits')->with('success','produit modifier avec success');
        }else{
            echo"error";
        }

    }
    //search function
    public function searchproduit(Request $request){
        if($request->produit_name && !$request->qte){
            $produits=produit::where('nom','LIKE','%'.$request->produit_name.'%')->get();
        }
        if(!$request->produit_name && $request->qte){
            $produits=produit::where('qte','>=',$request->qte)->get();
        }
        if($request->produit_name && $request->qte){
            $produits=produit::where('nom','LIKE','%'.$request->produit_name.'%')->where('qte','>=',$request->qte)->get();

        }
        if(!$request->produit_name && !$request->qte){
            $produits=produit::all();
        }
       $categories=categorie::all();

       return view('admin.produits.index')->with('produits',$produits)->with('categories',$categories);
    }



}
