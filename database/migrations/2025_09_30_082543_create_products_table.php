<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique(); // Product code
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // category relation
            $table->decimal('price', 10, 2); // Price
            $table->integer('stock')->default(0); // Stock quantity
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Optional product image
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
