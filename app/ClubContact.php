<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubContact extends Model
{
    public $timestamps = false;
    protected $table = 'club_contacts';
    protected $fillable = ['student_id','position'];
}
