<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Commande;
use App\User;
use App\ligneCommande;

class CommandeController extends Controller
{
    public function store(Request $request){
        //verifier si le commande est en cours
    $commandes=commande::where('client_id',Auth::user()->id)->where('etat','en_cours')->first();

      //creation commande
      if ($commandes) {//commande en cours existe
        //check if produit existe
        $existe=false;
        foreach($commandes->lignecommandes as $lignec){
            if ($lignec->produit_id==$request->idproduit) {
                $existe=true;
                $lignec->qte+=$request->qte;
                $lignec->update();
            }
        }
        if (!$existe) {  //existe false
         $lc=new ligneCommande();
        $lc->qte=$request->qte;
        $lc->produit_id=$request->idproduit;
        $lc->commande_id=$commandes->id;
        $lc->save();
        }
        return redirect('/client/cart')->with('success','produit ajouter ');
      }else{//commande n'existe pas
           $commandes=new commande();
      $commandes->client_id=Auth::user()->id;
      if ($commandes->save()) {
        //creation ligne de commande
        $lc=new ligneCommande();
        $lc->qte=$request->qte;
        $lc->produit_id=$request->idproduit;
        $lc->commande_id=$commandes->id;
        $lc->save();
        echo " produit commander";
        //redirection panier
        return redirect('/client/cart')->with('success','produit ajouter ');
      }else{
        return redirect()->back()->with('error','impossible de commander ce produit');
      }
      }
    }
    //supprimer ligne de commande
    public function lignecommandeDestroy($idlc){
        $lc=ligneCommande::find($idlc);
        $lc->delete();
        return redirect('/client/cart')->with('error','ligne de commande supprimer avec success');
    }
    public function searchcommande(Request $request){
        $commande=commande::where('etat','LIKE','%'.$request->etat.'%')->get();
        return view('admin.commandes.index')->with('commande',$commande);
    }

}
