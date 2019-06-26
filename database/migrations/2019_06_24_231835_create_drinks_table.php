<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand', 30);
            $table->unsignedTinyInteger('type');
            $table->string('flavor');
            $table->integer('mililiters');
            $table->decimal('price');
            $table->bigInteger('quantity')->default(0);
            $table->timestamps();

            $table->foreign('type')
                ->references('id')
                ->on('drink_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
