<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaminadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caminadas', function (Blueprint $table) {
            $table->id();
            $table->string('nom',200)->nullable();
            $table->text('descripcio')->nullable();
            $table->date('data_caminada')->nullable();
            $table->string('poblacio')->nullable();
            $table->string('direccio_inici')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('participants')->nullable();
            $table->integer('caminada_numero')->nullable();
            $table->foreignId('track_id')->nullable()->references('id')->on('file_uploads');
            $table->foreignId('imatges_id')->nullable()->references('id')->on('file_uploads')->nullable();
            $table->foreignId('mapa_id')->nullable()->references('id')->on('file_uploads')->nullable();
            $table->foreignId('altimetria_id')->nullable()->references('id')->on('file_uploads')->nullable();
            $table->foreignId('triptic_id')->nullable()->references('id')->on('file_uploads')->nullable();

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
        Schema::dropIfExists('caminadas');
    }
}
