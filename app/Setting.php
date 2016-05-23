<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    public function admin_information()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }
}
