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
    ];

    // 🧩 Add this for the stationery relationship
    public function stationery()
    {
        return $this->belongsTo(Stationery::class);
    }

    // 🏫 For school
    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    // 👷 For contractor
    public function contractor()
    {
        return $this->belongsTo(User::class, 'contractor_id');
    }
}
