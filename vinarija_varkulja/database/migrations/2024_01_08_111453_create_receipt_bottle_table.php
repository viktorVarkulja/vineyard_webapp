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
        Schema::create('receipt_bottle', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reciept_id')->unsigned();
            $table->bigInteger('bottle_id')->unsigned();
            $table->integer('bottle_quantity');
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
        Schema::dropIfExists('receipt_bottle');
    }
};
