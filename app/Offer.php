<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'user_id', 'mode', 'currency','min_value','max_value','payment_method','description','send_to','is_accepted','is_rejected','is_cancelled','offer_no'
    ];


    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

    */

    protected $hidden = [

        //'created_at','updated_at'

    ];

    public function sendBy()

    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }

    public function sendTo()

    {

        return $this->hasOne(User::class, 'id', 'send_to');

    }
}
