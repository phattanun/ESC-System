<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanEditActivity extends Model
{
    protected $table = "can_edit_activities";
    protected $fillable = ['act_id','student_id'];
    public $timestamps = false;
}
