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
        Schema::create('order_dues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('paid_amount', precision: 2)->nullable(false);
            $table->float('due_amount', precision: 2)->nullable();
            $table->string('paid_date')->nullable(false);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_dues');
    }
};
