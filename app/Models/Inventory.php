<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory, HasUuids;

    protected $table = 'inventories';
    
    public $incrementing = false;
    protected $keyType = 'string';



    protected $fillable = [
        'item_name',
        'price',
        'spesification',
        'qty_item',
        'qty_available',
        'qty_used',
        'qty_borrowed',
        'qty_broken',
        'user_id',
        'division_id',
        'category_id'
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }
}
