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
        Schema::create('matches', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('id_com1');
            $table->foreign('id_com1')->references('id')->on('teams');
            $table->unsignedBigInteger('id_com2');
            $table->foreign('id_com2')->references('id')->on('teams');
        });
    }

/* Reverse the migrations.
*/
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
