<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table="produits";
  protected $fillable=[
    'identification',
    'nom',
    'photo',
    'description',
    'quantite',
    'prix',
    'marque-id',
    'fournisseur-id',
    'categorie_id'
  ];

  public function marque(){
        return $this->belongsTo(\App\Marque::class);
      }
      public function fournisseur(){
        return $this->belongsTo(\App\Fournisseur::class);
      }
      public function ventes(){
        return $this->hasMany(\App\Vente::class);
      }
      public function categorie(){
            return $this->belongsTo(\App\Categorie::class);
          }
}
