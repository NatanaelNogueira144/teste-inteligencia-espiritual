<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('first_result');
            $table->integer('second_result');
            $table->integer('third_result');
            $table->integer('fourth_result');
            $table->integer('general_result');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
