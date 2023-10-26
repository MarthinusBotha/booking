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
        Schema::create('user_booking_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_item_id');
            $table->striing('full_name');
            $table->string('email', 100);
            $table->unsignedInteger('guests');
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['pending', 'approved', 'declined', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_booking_items');
    }
};
