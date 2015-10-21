<?php
//app/models/File.php

class McFile extends Eloquent  {

    protected $table = "files";

    public function filecategory() {
        return $this->belongsTo('FileCategory','file_category');
    }


}

?>