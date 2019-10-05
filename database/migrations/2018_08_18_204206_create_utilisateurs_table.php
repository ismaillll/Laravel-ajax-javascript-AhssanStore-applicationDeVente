<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->String('telephone')->unique();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('adresse');
          $table->string('photo')->nullable();
          $table->string('role')->nullable();
          $table->integer('vente_id')->nullable();
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
        Schema::dropIfExists('utilisateurs');
    }
}
