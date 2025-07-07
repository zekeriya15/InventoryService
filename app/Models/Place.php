<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory, HasUuids;

    protected $table = 'places';

    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'name',
        'address',
    ];

    public function itemDetails() {
        return $this->hasMany(ItemDetails::class, 'place_id', 'id');
    }

}
