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
        Schema::create('booking_files', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('path');
            $table->string('type', 100);
            $table->unsignedBigInteger('booking_item_id');
            $table->timestamps();

            $table->foreign('booking_item_id')
                ->references('id')
                ->on('booking_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_files');
    }
};
