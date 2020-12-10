<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteDemandeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_demandeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('localisation_id')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->unsignedBigInteger('telephone1')->nullable();
            $table->unsignedBigInteger('telephone2')->nullable();
            $table->unsignedBigInteger('telephone3')->nullable();
            $table->string('date_nais')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('age_dernier_enfant')->nullable();
            $table->string('metier')->nullable();
            $table->string('date_arret_dernier_metier')->nullable();
            $table->string('niveau_etude')->nullable();
            $table->string('langue')->nullable();
            $table->boolean('statut')->default('1')->nullable();
            $table->boolean('online')->default('1')->nullable();
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
        Schema::dropIfExists('compte_demandeurs');
    }
}
