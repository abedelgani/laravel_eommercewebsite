<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
  public function categorie(){
    return $this->belongsTo(categorie::class,'categorie_id','id');
  }

  public function reviews(){
    return $this->hasMany(review::class,'produit_id','id');
  }

  public function lignecommande(){
    return $this->hasMany(ligneCommande::class,'produit_id','id');
  }
}
