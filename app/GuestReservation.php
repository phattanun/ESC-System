<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestReservation extends Model
{
    protected $table = 'guest_reservation';
    protected $primaryKey = 'res_id';
    public $timestamps = false;
}
