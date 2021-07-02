<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identifiant_unique', 12)->unique();
            $table->longText('password');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone', 10);
            $table->string('nom', 40);
            $table->string('prenom', 30);
            $table->boolean('civilite');
            $table->boolean('connecte')->default(false);
            $table->boolean('disponible')->default(true);
            $table->timestamp('shadowban')->nullable();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('adresse', 75);
            $table->unsignedBigInteger('ville_id');
            $table->unsignedBigInteger('droit_id')->default(3);
            $table->unsignedBigInteger('dossier_id');
            $table->unsignedBigInteger('rayon_intervention_id')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('droit_id')->references('id')->on('droits');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->foreign('dossier_id')->references('id')->on('dossier_medicals');
            $table->foreign('rayon_intervention_id')->references('id')->on('rayon_interventions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
