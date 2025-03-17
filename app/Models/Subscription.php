<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'stripe_subscription_id',
        'stripe_status',
        'stripe_plan_id',
        'current_period_start',
        'current_period_end',
        'user_id',
        'plan_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    protected function casts():array
    {
        return [
            'current_period_start' => 'datetime',
            'current_period_end' => 'datetime',
        ];
    }

    /*
    public function definitions()
    {
        return $this->hasMany(Definition::class);
    }
    */

    public function getCurrentPeriodStartAttribute($value)
    {
        //much more safer to use $value ? Carbon::parse($value)->format('Y-m-d h:i:s'):null;
        //return $value ? Carbon::parse($value)->format('Y-m-d h:i:s') : null;
        return Carbon::parse($value)->format('Y-m-d h:i:s');
    }

    public function getCurrentPeriodEndAttribute($value)
    {
        //return $value ? Carbon::parse($value)->format('Y-m-d h:i:s') : null;
        return Carbon::parse($value)->format('Y-m-d h:i:s');
    }
}