<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReservation extends Model
{
    protected $table = 'user_reservation';
    protected $primaryKey = 'res_id';
    public $timestamps = false;

}
