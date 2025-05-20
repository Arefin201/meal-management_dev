<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['date', 'member_id', 'breakfast', 'lunch', 'dinner'];


     protected $casts = [
        'breakfast' => 'boolean',
        'lunch' => 'boolean',
        'dinner' => 'boolean',
    ];
    protected $dates = ['date'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

   public function getTotalAttribute()
    {
        return (int)$this->breakfast + (int)$this->lunch + (int)$this->dinner;
    }
}