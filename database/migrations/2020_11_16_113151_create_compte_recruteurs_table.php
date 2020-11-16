<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteRecruteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_recruteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('email', 150)->nullable();
            $table->unsignedBigInteger('telephone1')->nullable();
            $table->unsignedBigInteger('telephone2')->nullable();
            $table->unsignedBigInteger('telephone3')->nullable();
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
        Schema::dropIfExists('compte_recruteurs');
    }
}
