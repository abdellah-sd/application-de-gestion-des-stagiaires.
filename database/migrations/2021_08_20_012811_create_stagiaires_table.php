<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('birthplace');
            $table->string('gender');
            $table->string('adress');
            $table->string('phone');
            $table->string('email');
            $table->integer('annee');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('memoire');
            $table->date('date_depose_memoire')->nullable();
            $table->boolean('attachment');
            $table->foreignId('specialite_id')->constrained('specialites');
            $table->foreignId('departement_id')->constrained('departements');
            $table->foreignId('encadreur_id')->constrained('encadreurs');
            $table->foreignId('stage_id')->constrained('stages');
            $table->foreignId('universite_id')->constrained('universites');
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
        Schema::dropIfExists('stagiaires');
    }
}
