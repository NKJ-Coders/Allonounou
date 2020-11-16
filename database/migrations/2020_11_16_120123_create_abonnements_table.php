<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compte_recruteur_id')->nullable();
            $table->string('type')->nullable();
            $table->date('date_souscription')->nullable();
            $table->string('duree')->nullable();
            $table->date('date_arret')->nullable();
            $table->unsignedBigInteger('prix')->nullable();
            $table->unsignedBigInteger('credit')->nullable();
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
        Schema::dropIfExists('abonnements');
    }
}
