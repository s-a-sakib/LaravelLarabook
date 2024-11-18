<?php

use Faker\Calculator\Isbn;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('author',255);
            $table->string('isbn',13)->unique();
            $table->smallInteger('stock')->default(0);
            $table->float('price',8,2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
