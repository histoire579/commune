<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualites', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('service_id')->unsigned();
            $table->integer('theme_id')->unsigned();
            $table->integer('moyenne')->nullable();
            $table->integer('moyenneAcceptable')->nullable();
            $table->integer('app_id')->unsigned();
            $table->string('slug_app',110);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('thematiques')->onDelete('restrict');
            $table->foreign('app_id')->references('id')->on('appreciations')->onDelete('restrict');
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
        Schema::dropIfExists('qualites');
    }
}
