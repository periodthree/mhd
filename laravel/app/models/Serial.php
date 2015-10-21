<?php

class Serial extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'serials';


    public function products() {
        return $this->belongsTo('Product','model_id');
    }

    public function users() {
        return $this->belongsToMany('User', 'users_serials', 'user_id', 'serial_id');
    }


}
