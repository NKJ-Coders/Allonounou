<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnonceDemandeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_demandeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profil_id')->index()->nullable();
            $table->unsignedBigInteger('poste_id')->index()->nullable();
            $table->timestamps();
            $table->date('date_cloture')->nullable();
            $table->boolean('statut')->default('1')->nullable();
            $table->boolean('online')->default('1')->nullable();

            // forein_key
            $table->foreign('profil_id')->references('id')->on('profils');
            $table->foreign('poste_id')->references('id')->on('postes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonce_demandeurs');
    }
}
