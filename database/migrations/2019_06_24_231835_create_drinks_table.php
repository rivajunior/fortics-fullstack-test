<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand', 30);
            $table->unsignedTinyInteger('type_id');
            $table->string('flavor');
            $table->integer('mililiters');
            $table->decimal('price');
            $table->bigInteger('quantity')->default(0);
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('drink_types');

            $table->index(['brand', 'flavor', 'mililiters']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
