<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoneRecruteurJourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annone_recruteur_jour', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annone_recruteur_id')->nullable();
            $table->unsignedBigInteger('jour_id')->nullable();
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
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
        Schema::dropIfExists('annone_recruteur_jour');
    }
}
