<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDialUtilisateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
          $table->string('name');
          $table->String('telephone')->unique();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('adresse');
          $table->string('photo');
          $table->string('role')->nullable();
          $table->integer('id_vente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilisateurs', function (Blueprint $table) {
            //
        });
    }
}
