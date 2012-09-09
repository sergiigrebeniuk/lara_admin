<?php 
class DataHelper{
	
	public static function get( $model, $key, $display="both" ){
		$data=$model->$key;
		if ( isset($model->belongModels) && array_key_exists( $key, $model->belongModels) ) {
			$belongData= $model->belongModels[ $key ];

			if (  !isset( $belongData["showon"] ) || static::isValidView($belongData, $display) ) {

				if ( !isset( $belongData["model"] ) ) throw new Exception("Model Attribute not Found in belongsModels for $key", 1); ;
				if ( !isset( $belongData["column"] ) ) throw new Exception("Column Attribute not Found in belongsModels for $key", 1); ;

				$column= $belongData["column"] ;
				$modelName= ucwords($belongData["model"]);
				$belongModel=  $model->belongs_to("Admin\\Author", $key)->first();

				if ( isset($belongModel) ) {
					$data= $belongModel->$column;
				}

			}


		}
		return $data;
	}

	public static function isValidView( $belongData , $option){
		return  ( isset( $belongData["showon"] ) && ( $belongData["showon"]=="both" ||  $belongData["showon"]==$option ) );
	}


}