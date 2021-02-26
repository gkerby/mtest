<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'rates',
            function (Blueprint $table) {
                $table->id();
                $table->string('currency')->index();
                $table->decimal('_15m', 30, 10);
                $table->decimal('last', 30, 10);
                $table->decimal('buy', 30, 10);
                $table->decimal('sell', 30, 10);
                $table->string('symbol', 3);
                $table->dateTime('imported_at')->index();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
