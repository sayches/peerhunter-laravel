<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'measure_in', 'goal','experience','gender','dob','age','height','weight','device_type','device_token','current_week_start','is_intro_completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
