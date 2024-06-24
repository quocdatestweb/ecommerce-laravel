<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawsTable extends Migration
{
    public function up()
    {
        Schema::create('draws', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('total_tickets');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('draws');
    }
}