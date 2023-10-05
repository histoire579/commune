<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acteurs', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('com_id')->unsigned();
            $table->integer('qua_id')->unsigned();
            $table->string('nom',200);
            //$table->string('domaine',100);
            $table->string('localisation',50);
            $table->string('contact',20)->nullable();
            $table->string('capacite',30);
            $table->string('commodite',30)->nullable();
            $table->integer('cat_id')->unsigned();
            $table->string('autre',100)->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('slug',250);
            $table->string('image',100)->nullable();
            $table->string('com_slug',100);
            $table->string('qua_slug',100);
            $table->string('cat_slug',100);
            $table->foreign('com_id')->references('id')->on('communes')->onDelete('cascade');
            $table->foreign('qua_id')->references('id')->on('quartiers')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categorie_acteurs')->onDelete('cascade');
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
        Schema::dropIfExists('acteurs');
    }
}
