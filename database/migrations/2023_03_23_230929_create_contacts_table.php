<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('type_salle')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->date('date_reservation')->nullable();
            $table->integer('duree_par_heur')->nullable();
            $table->time('heur_debut')->nullable();
            $table->time('heur_fin')->nullable();
            $table->unsignedBigInteger('expediteur_id');
            $table->integer('distinataire_id');
            $table->foreign('expediteur_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
