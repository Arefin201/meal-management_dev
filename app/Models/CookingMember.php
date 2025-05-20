<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingMember extends Model
{
    use HasFactory;

    protected $table = "cooking_members";

    protected $fillable = [
        'name',
        'contact_number',
        'status',
    ];

    protected $casts = [
        'hourly_rate' => 'decimal:2'
    ];

    public function cookingpayments()
    {
        return $this->hasMany(CookingPayment::class);
    }

    public function payments()
    {
        return $this->hasMany(CookingPayment::class);
    }
    
}
