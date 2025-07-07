<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, HasUuids;

    protected $table = 'categories';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'name',
    ];


    public function inventory() {
        return $this->hasMany(Inventory::class);
    }
}
