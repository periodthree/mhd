<?php

class InstallerService extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'installerservices';


    public function installers() {
        return $this->belongsToMany('Installer', 'installers_services', 'installer_id', 'service_id');
    }


}
