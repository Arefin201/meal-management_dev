<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = "markets";

    protected $fillable = [
        'amount',
        'date',
        'member_id',
        'notes',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
    ];
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
