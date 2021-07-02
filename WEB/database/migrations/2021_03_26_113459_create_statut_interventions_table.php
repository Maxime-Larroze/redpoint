<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statut_interventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('intervention_id');
            $table->boolean('intervention_ack')->default(true);
            $table->dateTime('debut_intervention_at', $precision = 0);
            $table->dateTime('fin_intervention_at', $precision = 0);
            $table->string('commentaire', 250);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('intervention_id')->references('id')->on('interventions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statut_interventions');
    }
}
