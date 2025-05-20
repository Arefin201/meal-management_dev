<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";

    protected $fillable = [
        'name',
        'number',
        'email',
        'amount',
        'time',
        'status'
    ];

    protected $casts = [
        'time' => 'datetime',
        'amount' => 'decimal:2'
    ];

    protected $appends = ['avatar_url'];


    // Add this relationship
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function markets()
    {
        return $this->hasMany(Market::class);
    }

    public function getAvatarAttribute()
    {
        return "https://ui-avatars.com/api/?name=".urlencode($this->name)."&color=7F9CF5&background=EBF4FF";
    }

}
