<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');


    public function serials() {
        return $this->belongsToMany('Serial', 'users_serials', 'user_id', 'serial_id');
    }

    // public function rating() {
    //     return $this->hasOne('Rating');
    // }

    public function installer() {
        return $this->hasOne('Installer');
    }

}
