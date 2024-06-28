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
        Schema::table('gifts', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->after('image_url');
        });
    }
    
    public function down()
    {
        Schema::table('prizes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
