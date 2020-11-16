<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilAnnoneRecruteur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_annone_recruteur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('annone_recruteur_id');
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
        Schema::dropIfExists('profil_annone_recruteur');
    }
}
