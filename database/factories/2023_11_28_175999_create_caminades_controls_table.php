<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaminadesControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caminades_controls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caminada_id')->foreignId('caminada_id')->references('id')->on('caminades')->onDelete('cascade');
            $table->unsignedBigInteger('controls_id')->foreignId('control_id')->references('id')->on('controls')->onDelete('cascade');
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
        Schema::dropIfExists('caminades_controls');
    }
}
