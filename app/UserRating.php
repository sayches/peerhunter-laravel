<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    protected $fillable = [
        'user_id', 'sent_id', 'rating','offer_id'
    ];
}
