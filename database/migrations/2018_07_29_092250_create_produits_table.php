<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->String('identification');
            $table->String('nom');
            $table->String('photo')->nullable();
            $table->text('description');
            $table->integer('quantite');
            $table->integer('categorie_id')->nullable();
            //$table->integer('categorie_parent_id')->nullable();
            $table->float('prix');
            $table->integer('marque_id');
            $table->integer('fournisseur_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
