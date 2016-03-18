<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityFile extends Model
{
    protected  $table = 'activity_files';
    protected $primaryKey = "act_id";
    public $timestamps = false;

    protected $fillable=['act_id','file_name','type','size','content','create_at','uploader_id'];
}
