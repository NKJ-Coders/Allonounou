<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoneRecruteurTache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annone_recruteur_tache', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annone_recruteur_id');
            $table->unsignedBigInteger('tache_id');
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
        Schema::dropIfExists('annone_recruteur_tache');
    }
}
