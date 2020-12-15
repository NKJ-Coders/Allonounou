<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoneRecruteurUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annone_recruteur_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('annone_recruteur_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('titre', 100)->nullable();
            $table->string('contenu')->nullable();
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
        Schema::dropIfExists('annone_recruteur_user_signaler');
    }
}
