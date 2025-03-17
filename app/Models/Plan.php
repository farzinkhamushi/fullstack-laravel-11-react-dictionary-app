<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'number_of_hearts',
        'price',
        'price_id',
    ];

    public function subscriptions() 
    {
        return $this->hasMany(Subscription::class);
    }

    /*
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function definitions()
    {
        return $this->hasMany(Definition::class);
    }

    public function synonyms()
    {
        return $this->hasMany(Synonym::class);
    }
    
    public function antonyms()
    {
        return $this->hasMany(Antonym::class);
    }

    public function examples()
    {
        return $this->hasMany(Example::class);
    }

    */
}
