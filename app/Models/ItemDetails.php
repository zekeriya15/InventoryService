<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetails extends Model
{
    /** @use HasFactory<\Database\Factories\ItemDetailsFactory> */
    use HasFactory, HasUuids;

    protected $table = 'item_details';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'unique_id',
        'nota_path',
        'purchase_date',
        'serial_code',
        'image_path',
        'status',
        'condition',
        'inventory_id',
        'place_id',
        'loan_request_id'
    ];


    public function place() {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function loanRequest() {
        return $this->belongsTo(LoanRequest::class, 'loan_request_id', 'id');
    }
}
