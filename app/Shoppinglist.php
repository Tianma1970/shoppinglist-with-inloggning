<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shoppinglist extends Model
{
    protected $fillable = [
        'user_id',
        'title'
    ];

    public function shoppinglist()
    {
        return $this->belongsTo(Shoppinglist::class);
    }

    public function shoppingitems()
    {
        return $this->hasMany(Shoppingitem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
