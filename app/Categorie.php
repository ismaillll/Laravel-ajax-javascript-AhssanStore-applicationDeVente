<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{


    protected $table="categories";
        protected $fillable=[
          'nom',
          'parent_id',

        ];
        public function produits(){
              return $this->hasMany(\App\Produit::class);
            }

            public function categorie(){
                  return $this->belongsTo(\App\Categorie::class , 'parent_id');
                }


}
