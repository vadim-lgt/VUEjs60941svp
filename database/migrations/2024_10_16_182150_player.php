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
        Schema::create('player', function (Blueprint $table)
        {
            $table->id();
            $table->string('Full_name');
            $table->string('role');
            $table->unsignedBigInteger('id_teams');
            $table->foreign('id_teams')->references('id')->on('teams');
        });
    }

    /* Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('player');
    }
};
