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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('price');
            $table->text('spesification')->nullable();
            $table->bigInteger('qty_item')->nullable();
            $table->bigInteger('qty_available')->nullable();
            $table->bigInteger('qty_used')->nullable();
            $table->bigInteger('qty_borrowed')->nullable();
            $table->bigInteger('qty_broken')->nullable();
            $table->uuid('user_id');
            $table->uuid('division_id');
            $table->unsignedBigInteger('category_id');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
