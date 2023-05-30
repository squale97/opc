<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('profession')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->unique();
            $table->string('numero');
            $table->string('profile');
            $table->string('photo')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->uuid('ecole_id')->constrained('ecole_users')->nullable();
            $table->uuid('region_id')->constrained('regions');
            $table->uuid('province_id')->constrained('provinces')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
