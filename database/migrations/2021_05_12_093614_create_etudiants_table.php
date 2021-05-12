<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('classe_id')->constrained();
            $table->timestamps();
        });
        /* cette ligne va permettre de dire a Laravel d activer toutes les contrainte des cle etrangeres */
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiants',function(blueprint $table){
            /* cette ligne permet de supprimer les contrainte cree */
            $table->dropConstrainedForeignId("classe_id");
        });
        Schema::dropIfExists('etudiants');
    }
}
