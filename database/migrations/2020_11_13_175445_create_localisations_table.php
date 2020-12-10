<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_parent')->nullable();
            $table->string('designation');
            $table->unsignedInteger('distance')->nullable();
            $table->string('proximite')->nullable();
            $table->string('type')->nullable();
            $table->boolean('statut', 1)->default('1')->nullable();
            $table->boolean('online', 1)->default('1')->nullable();
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
        Schema::dropIfExists('localisations');
    }
}
