<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestetWachNitKaimse7 extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('users',function($table){
        $table->text('adresse')->after('password');
        $table->string('role')after('adresse');
        $table->binary('photo')->nullable()after('role');
        $table->integer('id_vente')->nullable()after('photo');
      });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('users',function($table){
        $table->dropColumn('adresse');

      });
  }
}
