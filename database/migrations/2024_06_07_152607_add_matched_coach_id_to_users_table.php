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
        Schema::table('users', function (Blueprint $table) {
            // Ensure the data type of the referenced column matches the data type of the referencing column
            $table->bigInteger('matched_coach_id')->unsigned()->nullable()->after('interests');
            $table->foreign('matched_coach_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['matched_coach_id']);
            $table->dropColumn('matched_coach_id');
        });
    }
};
