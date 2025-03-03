<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('side_bars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('X');
            $table->string('snapchat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_bars');
    }
};
