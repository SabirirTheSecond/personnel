<?php

use App\Models\Element;
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
        Schema::create('chef_sections', function (Blueprint $table) {
           
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->bigInteger('matricule')->unique();
            $table->string('section');
            $table->string('situation_familliale')->nullable();
            $table->string('ancien_lieu')->nullable();
            $table->binary('photo')->nullable();
            $table->string('vehiculé')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('arme')->nullable();
            $table->text('remarque')->nullable();
            $table->text('compte_rendu')->nullable();

            $table->foreignIdFor(Element::class)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_sections');
    }
};
