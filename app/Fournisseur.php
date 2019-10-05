<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{

    protected $table="fournisseurs";
  protected $fillable=[
    'nom',
    'email',
    'telephone',
    'fax',
    'ville',
    'adresse1',
    'adresse2'
  ];

  public function produits(){
    return $this->hasMany(\App\Produit::class);
  }

}
