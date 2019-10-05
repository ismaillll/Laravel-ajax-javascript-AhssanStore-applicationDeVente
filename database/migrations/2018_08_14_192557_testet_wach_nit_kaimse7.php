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

        $table->string('role')->after('adresse');

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
