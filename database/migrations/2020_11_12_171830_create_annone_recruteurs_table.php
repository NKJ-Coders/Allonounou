<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoneRecruteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annone_recruteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('compte_recruteur_id')->nullable();
            $table->unsignedInteger('poste_id')->nullable();
            $table->unsignedInteger('localisation_id')->nullable();
            $table->unsignedInteger('salaire')->nullable();
            $table->unsignedBigInteger('nbre_enfant')->nullable();
            $table->string('description')->nullable();
            $table->string('type_maison', 60)->nullable();
            $table->string('nbre_piece', 60)->nullable();
            $table->string('taille_maison', 60)->nullable();
            $table->boolean('residente')->nullable();
            $table->boolean('urgent')->nullable();
            $table->boolean('personnes_agees')->nullable();
            $table->timestamps();
            $table->date('date_cloture')->nullable();
            $table->boolean('statut')->default('1')->nullable();
            $table->boolean('online')->default('1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annone_recruteurs');
    }
}
