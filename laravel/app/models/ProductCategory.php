<?php
//app/models/Product_Category.php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductCategory extends Eloquent  {

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $table = "product_categories";


    public function products() {
         return $this->hasMany('Products');
    }

     public function parent()
    {
        return $this->belongsTo('ProductCategory', 'parent_category');
    }

    public function children()
    {
        return $this->hasMany('ProductCategory', 'parent_category');
    }

    public function files()
    {
        return $this->belongsToMany('McFile', 'productcategory_files', 'productcategory_id', 'file_id');
    }

}

?>
