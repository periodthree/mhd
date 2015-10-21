<?php
//app/models/Product_Category.php

class Products extends Eloquent  {

    protected $table = "products";

    public function productcategory() {
        return $this->belongsTo('ProductCategory','category_id');
    }

    public function serials() {
        return $this->hasMany('Serial');
    }



}

?>