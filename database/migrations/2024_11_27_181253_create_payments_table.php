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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('paid_amount', precision: 2)->nullable(false);
            $table->enum('payment_type', ['cash', 'mobile banking', 'wire transfer'])->nullable(false);
            $table->string('payment_account')->nullable(false);
            $table->string('paid_date')->nullable(false);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
