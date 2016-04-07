<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReservation extends Model
{
    protected $table = 'user_reservation';
    protected $primaryKey = 'res_id';
    public $timestamps = false;
    public function division()
    {
        return $this->belongsTo('App\Division', 'div_id');
    }
    public function activity()
    {
        return $this->belongsTo('App\Activity', 'act_id');
    }
}
