<?php


class Rating extends Eloquent  {

    protected $table = "ratings";

    public function user() {
        return $this->hasOne('User');
    }

}

?>