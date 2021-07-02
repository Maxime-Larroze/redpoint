<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_intervention_id');
            $table->dateTime('fin_intervention_at', $precision = 0)->nullable();
            $table->integer('nb_intervenant')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_intervention_id')->references('id')->on('type_interventions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
