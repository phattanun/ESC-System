<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllowSchedule extends Model
{
    protected $table = 'allow_schedules';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
