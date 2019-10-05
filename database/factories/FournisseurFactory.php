<?php

use Faker\Generator as Faker;

$factory->define(App\Fournisseur::class, function (Faker $faker) {
    return [
        'nom'=>$faker->name(),
        'email' =>$faker->email(),
        'telephone'=>$faker->phoneNumber(),
        'fax'=>$faker->phoneNumber(),
        'ville'=>$faker->city(),
        'adresse1'=>$faker->streetAddress(),
        'adresse2'=>$faker->streetAddress(),
    ];
});
