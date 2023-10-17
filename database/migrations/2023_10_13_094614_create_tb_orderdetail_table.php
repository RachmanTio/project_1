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
        Schema::create('tb_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', false)->nullable();
            $table->string('product_id', false)->nullable();
            $table->string('totalharga', false)->nullable();
            $table->string('qty', false)->nullable();
            $table->string('order_id', false)->nullable();
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
        Schema::dropIfExists('tb_orderdetail');
    }
};
