<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    public $timestamps = false;
    protected $primaryKey = 'student_id';
    protected $table = 'users';
    protected $fillable = ['student_id','password','name','surname','nickname','address','birthdate','phone_number','email','facebook_link','line_id','emergency_contact','department','group','generation','allergy','anomaly','religion','blood_type','clothing_size'];
    protected $hidden = ['password', 'remember_token'];
    public function department()
    {
        return $this->belongsTo('App\Division', 'department');
    }
    public function group()
    {
        return $this->belongsTo('App\Division', 'group');
    }
    public function generation()
    {
        return $this->belongsTo('App\Division', 'generation');
    }
}
