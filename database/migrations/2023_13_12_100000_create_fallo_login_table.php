<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFalloLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallo_login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->index();
            $table->unsignedBigInteger('user_id')->nullable()->foreignId('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('user_agent');
            $table->string('ip_address', 45);
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
        Schema::dropIfExists('fallo_login');
    }
}
