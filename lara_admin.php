<?php

class LaraAdmin{

	public static function make(){
		// Config::set('laraAdmin.models', array() );
		Config::set('laraAdmin.models', array(
				//example "Test", "User"
				"usuario",
				"OpcionUsuario",
				"establecimiento",
				"tipoEstablecimiento",
				"estadoPedido",
				"prioridadPedido",
				"Pedido",
				"tipoPedido",
				"Promocion"
			));
		Config::set('laraAdmin.title', "Framework Drakar");
		
	}

}

?>