<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_by', 'report_to', 'option','comment'
    ];

    public function reportBy()

    {

        return $this->hasOne(User::class, 'id', 'report_by');

    }

    public function reportTo()

    {

        return $this->hasOne(User::class, 'id', 'report_to');

    }
}
