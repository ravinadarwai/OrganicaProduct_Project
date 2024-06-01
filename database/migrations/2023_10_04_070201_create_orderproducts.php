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


        Schema::create('orderproducts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->string('product_id');
            $table->string('name')->nullable();
            $table->json('image')->nullable(); // Set 'image' column to default to null
            $table->json('sprice')->nullable(); // Set 'sprice' column to default to null
            $table->unsignedBigInteger('total_amount');
            $table->string('status')->default('pending')->change;
            $table->timestamps();
        });
    }
            

  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderproducts');
    }
};