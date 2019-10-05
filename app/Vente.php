<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{

  protected $table="ventes";
    protected $fillable=[

      	'produit_id',
        'user_id',
      'quantitevendu',
      'prix',
      'description'
    ];

    public function produit(){
          return $this->belongsTo(\App\Produit::class);
        }
        public function user(){
              return $this->belongsTo(\App\User::class);
            }

}
