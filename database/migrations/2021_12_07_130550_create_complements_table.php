<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complements', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('demande_id')->constrained('demandes');
            $table->string('cnib',100);
            $table->string('extrait',100);
            $table->string('fiche_inscription',100);
            $table->string('engagement',100);
            $table->string('photo');
            $table->string('diplome');
            $table->string('permis')->nullable();          
            
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
        Schema::dropIfExists('complements');
    }
}
