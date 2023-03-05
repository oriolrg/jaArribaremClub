<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->string('nom',120)->nullable();
            $table->text('descripcio')->nullable();
            $table->float('distancia')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->unsignedBigInteger('caminada_id')->references('id')->on('caminades')->onDelete('cascade');
            $table->unsignedBigInteger('num_control');
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
        Schema::dropIfExists('controls');
    }
}
