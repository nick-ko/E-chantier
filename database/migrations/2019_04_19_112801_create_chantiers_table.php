<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChantiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chantiers', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('chantier_code');
            $table->string('chantier_name');
            $table->string('chantier_ville');
            $table->date('chantier_time');
            $table->string('chantier_plan');
            $table->string('chantier_image');
            $table->string('chantier_alt');
            $table->string('chantier_long');
            $table->string('chantier_chief');
            $table->date('chantier_debut');
            $table->string('chantier_budget');
            $table->smallInteger('chantier_status')->default(0);
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
        Schema::dropIfExists('chantiers');
    }
}
