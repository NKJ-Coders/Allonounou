<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profil_id')->nullable();
            $table->string('nom_patronne')->nullable();
            $table->unsignedBigInteger('telephone_patronne')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('raison_rupture')->nullable();
            $table->unsignedBigInteger('salaire')->nullable();
            $table->boolean('statut')->default('1')->nullable();
            $table->boolean('online')->default('1')->nullable();
            $table->timestamps();

            $table->foreign('profil_id')->references('id')->on('profils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
