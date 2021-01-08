<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compte_demandeur_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('cni', 150)->nullable();
            $table->string('photo', 150)->nullable();
            $table->string('plan_localisation', 150)->nullable();
            $table->string('certificat_medical', 150)->nullable();
            $table->string('casier_judiciaire', 150)->nullable();
            $table->string('nom_pere', 100)->nullable();
            $table->string('nom_mere', 100)->nullable();
            $table->string('lieu_nais', 100)->nullable();
            $table->unsignedBigInteger('nbre_enfant')->nullable();
            $table->string('personne_proche1')->nullable();
            $table->string('personne_proche2')->nullable();
            $table->unsignedBigInteger('telephone_personne_proche1')->nullable();
            $table->unsignedBigInteger('telephone_personne_proche2')->nullable();
            $table->boolean('handicape_moteur')->nullable();
            $table->boolean('handicape_visuel')->nullable();
            $table->boolean('handicape_des_mains')->nullable();
            $table->boolean('statut')->default('0')->nullable();
            $table->boolean('online')->default('1')->nullable();
            $table->timestamps();

            // $table->foreign('compte_demandeur_id')->references('id')->on('compte_demandeurs');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profils');
    }
}
