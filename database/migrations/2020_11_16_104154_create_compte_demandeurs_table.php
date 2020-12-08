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
            $table->unsignedBigInteger('telephone1')->nullable();
            $table->unsignedBigInteger('telephone2')->nullable();
            $table->unsignedBigInteger('telephone3')->nullable();
            $table->unsignedBigInteger('age')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->unsignedBigInteger('age_dernier_enfant')->nullable();
            $table->string('metier')->nullable();
            $table->date('date_arret_dernier_metier')->nullable();
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
