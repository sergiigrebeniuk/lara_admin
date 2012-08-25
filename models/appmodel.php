<?php namespace Admin; 
 class Appmodel extends \Eloquent{ 
 	public $errors=array();
 	public $validator;
 	public $confirmationDeleteText="Are you sure you want to delete it?";
 	public function validate(){
 		$this->validator = \Validator::make( $this->attributes , $this->rules);
 		return $this->validator->passes();
 	}

 	public function first_error( $field ){
 		return  ( isset( $this->validator->errors ) ) ? $this->validator->errors->first( $field ) : "" ;
 	}
 } 
 ?> 