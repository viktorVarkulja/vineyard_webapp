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
        Schema::create('bottles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wine_id')->unsigned();
            $table->string('name');
            $table->string('size');
            $table->string('image');
            $table->bigInteger('quantity');
            $table->boolean('in_stock');
            $table->decimal('cost_RSD');
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
        Schema::dropIfExists('bottles');
    }
};
