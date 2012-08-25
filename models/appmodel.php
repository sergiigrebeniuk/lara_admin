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

 	public function columns(){
 		$columns= array(); 
 		
 		if ( count( $this->index ) <= 0 ) {
 			$columnKeys= array_keys( (array) $this->attributes );

 			foreach ($columnKeys as  $key) {
 				array_push($columns,  new \ColumnHelper($key) );
 			}
 		}else{
 			foreach ($this->index as $key => $options) {
 				if (is_numeric($key)) {
 					$column= new \ColumnHelper( $options );
 				}else{
 					$caption= isset($options["caption"])? $options["caption"]: null;
 					$title= isset($options["title"])? $options["title"]: null;
 					$column= new \ColumnHelper( $key, $title, $caption );
 				}

 				array_push( $columns, $column );
 			}

 		}

 		return $columns;
 	}
 } 
 ?> 