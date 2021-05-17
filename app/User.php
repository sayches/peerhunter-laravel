<?php
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasRoles, Notifiable, HasApiTokens;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }

    protected $guarded = ['id'];


    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

    */

    protected $hidden = [

        'password', 'remember_token','api_token','updated_at','deleted_at','email_verified_at'

    ];



    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];

    public function offer()

    {

        return $this->belongsTo(Offer::class, 'user_id', 'id');

    }

    public function sentOffer()

    {

        return $this->belongsTo(Offer::class, 'send_to', 'id');

    }

    public function reportedBy()

    {

        return $this->belongsTo(Report::class, 'report_by', 'id');

    }

    public function reportedTo()

    {

        return $this->belongsTo(Report::class, 'report_to', 'id');

    }

}

