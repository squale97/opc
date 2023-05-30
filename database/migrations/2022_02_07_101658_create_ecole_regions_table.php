<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoleRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecole_regions', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('ecole_id')->constrained('ecole_users');
            $table->uuid('region_id')->constrained('regions');
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
        Schema::dropIfExists('ecole_regions');
    }
}
