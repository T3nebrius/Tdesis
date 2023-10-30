<?php

    /**
     * 
     * Rub�n Sep�lveda O.
     * 29-10-2023
     * 
     * 
     * data
     *
     * callbacks de clase b�squeda parametrizada para back
	 * 
     *
     */
require('busquedas.php');
$busqueda = new Busqueda();

$op = $_GET['op'];


switch($op){
    case 'comuna':
        $val = $_GET['valor'];
        $busqueda->ComunasPorRegion($val);
    break;
    case 'region':
        $busqueda->Regiones();
    break;
    case 'candidato':
        $busqueda->Candidatos();
    break;
    case 'votante':
        $val = $_GET['valor'];
        $busqueda->BuscarVotante($val);
    break;

}


?>
