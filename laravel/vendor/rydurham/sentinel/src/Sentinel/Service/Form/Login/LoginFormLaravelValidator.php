<?php namespace Sentinel\Service\Form\Login;

use Sentinel\Service\Validation\AbstractLaravelValidator;

class LoginFormLaravelValidator extends AbstractLaravelValidator {
	
	/**
	 * Validation rules
	 *
	 * @var Array 
	 */
	protected $rules = array(
		'email' => 'required|min:4|max:254',
		'password' => 'required|min:6'
	);

}