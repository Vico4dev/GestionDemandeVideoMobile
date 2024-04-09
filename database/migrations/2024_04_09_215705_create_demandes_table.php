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
            $table->id();
            $table->date('date_demande');
            $table->string('demandeur_nom');
            $table->string('demandeur_prenom');
            $table->string('service');
            $table->string('localisation_exacte');
            $table->string('commune');
            $table->string('validateur')->nullable();
            $table->date('date_validation')->nullable();
            $table->boolean('demande_prestataire')->default(false);
            $table->date('date_mise_en_place')->nullable();
            $table->text('commentaires')->nullable();
            $table->string('photo')->nullable();
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
