<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoneRecruteurCompteDemandeurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annone_recruteur_compte_demandeur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annone_recruteur_id')->nullable();
            $table->unsignedBigInteger('compte_demandeur_id')->nullable();
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
        Schema::dropIfExists('annone_recruteur_compte_demandeur');
    }
}
