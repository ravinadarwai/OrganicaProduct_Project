<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('addproducts', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('vegeno');// Vegetable number
            $table->string('name');// Vegetable name
            $table->date('date');// Date
            $table->string('category')->nullable();// Category (e.g., Green Vegetable, Root Vegetable, Meat)
            $table->integer('quant'); // Quantity
            $table->decimal('sprice', 10, 2); // Selling price (decimal with 2 decimal places)
            $table->decimal('cprice', 10, 2); // Cost price (decimal with 2 decimal places)
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            // Description
            $table->timestamps(); // 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addproducts');
    }
};
