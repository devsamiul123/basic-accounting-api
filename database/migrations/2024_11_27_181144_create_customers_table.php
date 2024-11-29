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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(false);
            $table->string('mobile_no')->nullable(false);
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('tin_bin_nid')->nullable();
            $table->enum('tin_bin_nid_type', ['TIN', 'BIN', 'NID'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
