<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CookingPayment extends Model
{
    protected $table = "cooking_payments";
    
    protected $fillable = [
        'cooking_member_id',
        'amount',
        'payment_date',
        'notes'
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function cooking_member()
    {
        return $this->belongsTo(CookingMember::class, 'cooking_member_id');
    }
}

