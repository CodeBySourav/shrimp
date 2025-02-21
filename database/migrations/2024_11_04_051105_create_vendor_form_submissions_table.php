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
        Schema::create('vendor_form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('quantity_range');
            $table->decimal('price', 8, 2);
            $table->string('validity');
            $table->string('treatment');
            $table->text('description')->nullable();
            $table->string('user_id');
            $table->string('user_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_form_submissions');
    }
};
