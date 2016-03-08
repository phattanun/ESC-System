<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityFile extends Model
{
    protected $table = 'activitiy_files';
    protected $primaryKey = "act_id";
    public $timestamps = false;
}
