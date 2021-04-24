<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'mode', 'currency','min_value','max_value','payment_method','description'
    ];


    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

    */

    protected $hidden = [

        'created_at','updated_at'

    ];
}
