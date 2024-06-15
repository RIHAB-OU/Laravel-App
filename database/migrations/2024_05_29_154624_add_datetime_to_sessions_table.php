<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dateTime('start_date')->nullable()->after('name');
            $table->dateTime('end_date')->nullable()->after('start_date');
        });
    }

    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date']);
        });
    }
};
