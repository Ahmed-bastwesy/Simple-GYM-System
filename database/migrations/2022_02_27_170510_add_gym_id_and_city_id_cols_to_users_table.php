<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            // $table->bigInteger('gym_id')->after('banned_at');
            $table->foreignId('gym_id')->references('id')->on('gyms')->onDelete('cascade')->Nullable;

            // // $table->bigInteger('city_id')->after('gym_id');
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade')->Nullable;
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
            //
        });
    }
};
