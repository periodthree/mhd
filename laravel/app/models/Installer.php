<?php
//app/models/Product_Category.php

class Installer extends Eloquent  {

    protected $table = "installers";

    // public function zips() {
    //     return $this->hasMany('Zips');
    // }

     public function services() {
        return $this->belongsToMany('InstallerService', 'installers_services', 'installer_id', 'service_id');
    }

}

?>