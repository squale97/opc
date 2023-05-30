<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('numero');
            $table->string('nom');
            $table->string('prenom');
            $table->string('genre');
            $table->dateTime('datenaissance');
            $table->string('lieunaissance');
            $table->string('typepiece');
            $table->string('reference');
            $table->dateTime('datedelivrance');
            $table->string('telephone');
            $table->string('email');
            $table->string('nom_personne');
            $table->string('tel_personne');
            $table->string('residence');
            $table->string('typeformation_id')->constrained('formations');
            $table->string('niveauformation_id')->constrained('niveaux')->nullable();
            $table->string('classe')->nullable();
            $table->string('diplome_id')->constrained('diplomes')->nullable();
            $table->string('qualification')->nullable();
            $table->string('occupation');
            $table->string('permis')->nullable();
            $table->string('langue');
            $table->enum('code_status', ['0', '1', '-1'])->default(0);
            $table->enum('creneau_status', ['0', '1', '-1'])->default(0);
            $table->enum('conduite_status', ['0', '1', '-1'])->default(0);
            $table->enum('permis_status', ['0', '1', '-1'])->default(0);
            $table->enum('abandon_status', ['0', '1'])->default(0);
           
            // $table->boolean('code_status')->default(false);
            // $table->boolean('creneau_status')->default(false);
            // $table->boolean('conduite_status')->default(false);
            // $table->boolean('permis_status')->default(false);
            // $table->boolean('abandon_status')->default(false);
            $table->string('status_demande')->nullable();
            $table->boolean('status_paiement')->default(false);
            $table->string('date_payement')->nullable();
            $table->string('montant_payement')->nullable();
            $table->uuid('session_id')->constrained('sessions');
            $table->foreignId('user_id')->constrained('users');
            $table->uuid('region_id')->constrained('regions');
            $table->uuid('province_id')->constrained('provinces');
            $table->uuid('commune_id')->constrained('communes');
            $table->uuid('arrondissement_id')->constrained('arrondissements')->nullable();
            $table->uuid('secteur_id')->constrained('secteurs')->nullable();
            $table->uuid('village_id')->constrained('villages')->nullable();
            $table->uuid('transfere_autoecole_id')->nullable();
            $table->uuid('admin_transfere_autoecole_id')->nullable();
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
        Schema::dropIfExists('demandes');
    }
}
