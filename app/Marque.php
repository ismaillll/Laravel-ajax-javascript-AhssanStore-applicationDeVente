<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{

    protected $table="marques";
  protected $fillable=[
    'nom',
    'logo',
    'description'
  ];


      public function produits(){
        return $this->hasMany(\App\Produit::class);
      }
}
