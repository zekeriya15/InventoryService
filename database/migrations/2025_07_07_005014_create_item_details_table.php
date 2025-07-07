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
        Schema::create('item_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('unique_id')->unique();
            $table->string('nota_path')->nullable();
            $table->date('purchase_date');
            $table->string('serial_code')->nullable();
            $table->string('image_path')->nullable();

            $table->enum('status', ['tersedia', 'terpakai', 'pending']);
            $table->enum('condition', ['baik', 'rusak', 'maintenance']);

            $table->uuid('inventory_id');
            $table->uuid('place_id');
            $table->uuid('loan_request_id')->nullable();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_details');
    }
};
