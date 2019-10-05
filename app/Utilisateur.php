<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
  protected $fillable = [
    'name', 'email', 'password','telephone','adresse','role','photo','id_vente',
  ];
}
