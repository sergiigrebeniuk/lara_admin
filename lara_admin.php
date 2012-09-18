<?php

class LaraAdmin
{

	public static function make()
	{
		// Config::set('laraAdmin.models', array() );
		Config::set(
			'laraAdmin.models',
			array(
				//example "Test", "User"
			)
		);
		Config::set('laraAdmin.title', "Lara Admin");
	}

}