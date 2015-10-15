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



    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'users';
    //protected $table = 'system_user';
    protected $table = 'user';
    //protected $table = 'myuser';

    protected $primaryKey = 'Auto_No';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['name', 'email', 'password'];
    //protected $fillable = ['username', 'password'];
    protected $fillable = ['user_username', 'user_pwd'];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['password', 'remember_token'];
    protected $hidden = array('user_pwd');

    // Override required, otherwise existing Authentication system will not match credentials
    public function getAuthPassword()
    {
        return $this->user_pwd;
    }

    public function getAuthIdentifier() {
        return $this->getKey();
    }


}
