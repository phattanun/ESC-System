<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    protected $table = 'meeting_room';
    protected $primaryKey = 'room_id';
    public $timestamps = false;
}
