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
        Schema::create('tb_selesai', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', false)->nullable();
            $table->string('ID_PRODUCT', false);
            $table->string('total', false);
            $table->string('gambar', false);
            $table->string('status', false);
            $table->string('nama', false);
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
        Schema::dropIfExists('tb_selesai');
    }
};
