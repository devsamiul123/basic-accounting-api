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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable(false)->constrained()->noActionOnUpdate()->noActionOnDelete(); // No Cascade
            $table->integer('qty')->nullable(false)->default(1);
            $table->float('unit_in_number', precision: 2)->nullable(false);
            $table->string('unit_in_string')->nullable(false);
            $table->float('item_price', precision: 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
