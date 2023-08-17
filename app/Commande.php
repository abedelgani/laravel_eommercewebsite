<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function lignecommandes(){
        return $this->hasMany(ligneCommande::class,'commande_id','id');
    }
    /**
     * Get the user that owns the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

     //total prix commande
     public function gettotal(){
        $total=0;
        foreach($this->lignecommandes as $lc){
            $total+=$lc->produit->price*$lc->qte;
        }
        return $total;
    }

}
