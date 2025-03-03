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
        Schema::create('product_projects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('projectId');
            $table->foreign('projectId')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_projects');
    }
};
