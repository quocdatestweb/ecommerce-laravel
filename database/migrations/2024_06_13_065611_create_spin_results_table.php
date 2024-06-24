<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('spin_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spin_id');
            $table->unsignedBigInteger('prize_id')->nullable();
            $table->timestamps();
            
            $table->foreign('spin_id')->references('id')->on('spins')->onDelete('cascade');
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('spin_results');
    }
};
