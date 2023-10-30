<?php

    /**
     * 
     * Rubén Sepúlveda O.
     * 29-10-2023
     * 
     * 
     * Helper
     *
     * Declaracion de clase Helper
	 * 
     *
     */

class Helper {

    public function __construct(){

    }

    /**
     * Sanitizar variables 
     *
     * verifica que las variables que se pasen a string SQL no sean susceptibles a inyectarse 
	 * (XSS tipo blind, union, boolean)
	 * debe se usado en variables que sean integer
	 * ejemplo: $variable = Helper::sanitizaInt($variable);
	 * 
     *
     * @return integer $monto Entero 
     */
	
     public static function sanitizaInt($param) {
		$sanitizado = filter_var($param, FILTER_SANITIZE_NUMBER_INT);
		$largo_esperado = strlen($sanitizado);
		$largo_real = strlen($param);
		if($largo_real == $largo_esperado){
			return $param;
		}else{
			/*CODIGO NOTIFICACION DE INYECCION*/
			return 0;
		}
	}

}