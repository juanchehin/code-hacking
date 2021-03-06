<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active','',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }

    // Checkea el rol
    public function isAdmin(){
        // if($this->role->name == "administrador" && $this->is_active == 1){
        if($this->role_id == 1 && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
