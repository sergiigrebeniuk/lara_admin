# LARA ADMIN
**Version. 0.1 Alpha**

PLEASE READ DOCUMENTATION

Simple but effective admin page for any project.

###Installation:

To install lara_admin just type in console into your project:

	$ php artisan bundle:install Lara-Admin
	$ php artisan bundle:publish
And

	return array( 
		"lara_admin" =>array(
		'handles'=> 'lara_admin',
		'auto' => true
		),
	)

###Setup User

$ php artisan lara_admin::laraAdmin:setup [test@test.com] [password] [force]


The fist command create a file into lara_admin/config/ with the user and password given in the console line. if you didnt  specify some user and password the default should be:

	user: test@test.com
	password: passsword

Also, you can use force to replace the actual file with "force"  third parameter .

###Settings Models

* ***Create models***

For create a new model type in your console:
 
	$  php artisan  lara_admin::laraAdmin:resource [name_resources]*

*Example*

	$ php artisan  lara_admin::laraAdmin:resource user role

that created different model files into the lara_admin folder ../bundles/lara_admin/models/. Each one with these default information:

	<?php namespace Admin; 
 		class [ClassName] extends Appmodel{ 
 			public static $table ='tests';  
 			public $index= array();  
 			public $new=array();  
 			public $edit= array();  
 			public $show= array(); 
 			public $rules = array();
 		} 
 	?> 
***variables***:

**$table**[required]: You must add your table before start the admin.

**$index**[not implemented]: Specific columns showed into the index table page.

**$new**[not implemented]: Specific columns showed into the new form page for each model.

**$edit**[required]: list of columns to edit and new pages. some options are:

	- require (true|false)
	- class (css_classes)
	- type  (input|checkbox|email).  select input not implemented yet.
	- all option used into the third parameter to [Form::input](http://laravel.com/api/class-Laravel.Form.html).

**$rules**: normal format rules for attributes models [link](http://laravel.com/docs/validation ).

Edit example 
	 	public $edit= array(
 		"nombre"=>array("require"=>true), 
 		"email"=>array("type"=>"email"),
 		"fecha"=>array("type"=>"text", "class"=>"mono"),
 		"isMale"=>array("type"=>"checkbox")
 		);  


##***register your new model***

Add the models created inside the list Config::set('laraAdmin.models') located into the file ./bundles/lara_admin/lara_admin.php 
	
	Config::set('laraAdmin.models', array( "[nameModel]") );



###Let's have fun 

Go to your browser and type your lara_admin project url 

	http://[your_url_project]/lara_admin




### TODO

**Version. 0.1 Alpha**

- Test
- Refactor
- select with nested attributes
- Implemented option new and index into the models.
- Implemented selected for input options.


