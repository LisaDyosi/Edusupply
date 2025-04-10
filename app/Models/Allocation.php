<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'stationery_id',
        'school_id',
        'contractor_id',
        'quantity',
        'status',
        'confirmation_code'
    ];

    public function stationery()
    {
        return $this->belongsTo(Stationery::class);
    }

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    public function contractor()
    {
        return $this->belongsTo(User::class, 'contractor_id');
    }
}
