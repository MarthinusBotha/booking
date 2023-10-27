<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookingItem;

class BookingItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookingItem::factory()->count(10)->create();
    }
}
