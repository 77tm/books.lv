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
        Schema::create('reading_list_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reading_list_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            $table->foreign('reading_list_id')->references('id')->on('reading_list')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reading_list_books');
    }
};
