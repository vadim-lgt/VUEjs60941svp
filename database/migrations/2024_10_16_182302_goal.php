<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/* Run the migrations.
*/
    public function up(): void
    {
        Schema::create('goal', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('id_matches');
            $table->foreign('id_matches')->references('id')->on('matches');
            $table->unsignedBigInteger('id_player');
            $table->foreign('id_player')->references('id')->on('player');
            $table->dateTime('start_game');
        });
    }

/* Reverse the migrations.
*/
    public function down(): void
    {
        Schema::dropIfExists('goal');
    }
};
