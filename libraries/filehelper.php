<?php
class FileHelper{

	public static function upload($model, $modelName, $name, $attribute, $removePastImage=true){
			$uploadOptions= $attribute["uploadOptions"];
			$path= "public";
			$beforeImage= $model->$name;

			if (isset( $uploadOptions["path"] )) {
				$path=$uploadOptions["path"];
			}

			$files= Input::file( $name );
			if ( $files["name"]=="" ) {
				return false;
			}

			$extension = File::extension( $files["name"] );
			$directory = path( $path ). $uploadOptions["directory"];
			$filename = sha1( Session::has("token_user").time()).".{$extension}"; 
			$successUpload= Input::upload( $name , $directory, $filename);

			if ($successUpload===false) {
				return false;
			}

			if (File::exists( $beforeImage )) {
				File::delete( $beforeImage );
			}
		return array( "fullPath"=>$directory."/".$filename , "fileName"=> $filename);
	}

	private static function fileAttributes($attributes){
		$searchFunc= function($value){

			if (!isset($value["type"])) {
				return false;
			}

			if ($value["type"]!="file") {
				return false;
			}

			var_dump( $value );

			return true;

		};

		return array_filter( $attributes, $searchFunc);
	}

}