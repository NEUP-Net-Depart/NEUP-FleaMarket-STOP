<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_info',function(Blueprint $table){
            $table->increments('id');
            $table->string('good_name');
            $table->integer('cat_id');
            $table->text('description');
            $table->biginteger('price');
            $table->tinyinteger('type');
            $table->integer('user_id');
            $table->integer('counts');
            $table->boolean('baned');
            $table->boolean('stared');
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
        Schema::drop('good_info');
    }
}
