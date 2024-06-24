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
        Schema::table('prizes', function (Blueprint $table) {
            $table->decimal('winning_rate', 5, 2)->after('quantity');
            $table->enum('status', ['active', 'inactive'])->after('winning_rate');
        });
    }
    
    public function down()
    {
        Schema::table('prizes', function (Blueprint $table) {
            $table->dropColumn('winning_rate');
            $table->dropColumn('status');
        });
    }
};
