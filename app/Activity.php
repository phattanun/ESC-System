<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $primaryKey = "act_id";
    protected $fillable = ['name','year','category','tqf_ethics','tqf_knowledge','tqf_cognitive','tqf_interpersonal','tqf_communication','status','avail_year','div_id','creator_id','editor_id'];
    public function file()
    {
        return $this->hasMany('App\ActivityFile', 'act_id');
    }
}
