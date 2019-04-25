<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('etat_fondation')->default(0);
            $table->integer('etat_soubassement')->default(0);
            $table->integer('etat_elevation_mur')->default(0);
            $table->integer('etat_charpente')->default(0);
            $table->integer('etat_couverture')->default(0);
            $table->decimal('etat_general')->default(0);
            $table->string('id_chantier');
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
        Schema::dropIfExists('details');
    }
}
