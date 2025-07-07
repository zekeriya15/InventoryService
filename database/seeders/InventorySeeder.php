<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            'item_name' => 'USB hub',
            'price' => 10000,
            'spesification' => ' 2 meters long usb hub',
            'qty_item' => 10, 
            'qty_available' => 10, 
            'qty_used' => 0, 
            'qty_borrowed' => 0, 
            'qty_broken' => 0,
            'user_id' => '0197db7e-2618-7221-a2b0-80c3b27d4314',
            'division_id' => '0197daba-0fa2-729a-a154-9c15abdb9921',
            'category_id' => '0197e2bb-266e-7365-bd2a-21ce7ed8a12a'
        ]);
    }
}
