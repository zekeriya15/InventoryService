<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    /** @use HasFactory<\Database\Factories\LoanRequestFactory> */
    use HasFactory, HasUuids;

    protected $table = 'loan_requests';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'status',
        'notes',
        'user_id',
        'approver_id',
        'place_id'
    ];

    public function itemDetails() {
        return $this->hasMany(ItemDetails::class, 'loan_request_id', 'id');
    }

    public function place() {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

}
