<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_favourite', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_PRODUCT', false);
            $table->string('nama');
            $table->string('gambar');
            $table->integer('harga');
            $table->integer('user_id', false)->nullable();
            $table->integer('qty', false);
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
        Schema::dropIfExists('tb_favourite');
    }
};
