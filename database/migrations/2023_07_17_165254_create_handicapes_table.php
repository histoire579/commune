<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandicapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handicapes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('com_id')->unsigned();
            $table->integer('qua_id')->unsigned();
            $table->string('matricule',10)->nullable();
            $table->string('nom',200);
            $table->string('anneeNais',10);
            $table->string('sexe',10);
            $table->string('lieuNais',200);
            $table->string('cni',30)->nullable();
            $table->string('ci',30)->nullable();
            $table->integer('type_id')->unsigned();
            $table->string('occupation',50)->nullable();
            $table->string('niveau',30)->nullable();
            $table->string('formation',50)->nullable();
            $table->string('besoin',50)->nullable();
            $table->string('telephone',20)->nullable();
            $table->integer('acteur_id')->unsigned();
            $table->string('detail',200)->nullable();
            $table->string('seuil',50)->nullable();
            $table->string('siCni',10)->nullable();
            $table->string('siCniv',10)->nullable();
            $table->string('siActe',10)->nullable();
            $table->string('acteNais',50)->nullable();
            $table->string('situation',50)->nullable();
            $table->string('polyhandicap',50)->nullable();
            $table->string('scolaire',20)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('groupe_id')->unsigned();
            $table->string('slug',250);
            $table->string('image',200)->nullable();
            $table->string('com_slug',100);
            $table->string('qua_slug',100);
            $table->string('type_slug',100);
            $table->foreign('com_id')->references('id')->on('communes')->onDelete('cascade');
            $table->foreign('qua_id')->references('id')->on('quartiers')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes');
            $table->foreign('acteur_id')->references('id')->on('acteurs');
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
        Schema::dropIfExists('handicapes');
    }
}
