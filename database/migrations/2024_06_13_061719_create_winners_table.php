<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('draw_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('prize_id');
            $table->timestamps();

            $table->foreign('draw_id')->references('id')->on('draws');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('prize_id')->references('id')->on('prizes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('winners');
    }
}