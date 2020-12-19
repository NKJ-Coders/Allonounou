<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnonceDemandeurCompteRecruteurSelectionnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectionner_profil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annonce_demandeur_id')->nullable();
            $table->unsignedBigInteger('compte_recruteur_id')->nullable();
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
        Schema::dropIfExists('selectionner_profil');
    }
}
