<?php

    /**
     * 
     * Rubén Sepúlveda O.
     * 29-10-2023
     * 
     * 
     * busquedas
     *
     * aqui se determinan las busquedas, declaradas como métodos de clase "Busqueda"
	 * 
     *
     */

require('query.php');
require('helper.php');


class Busqueda{

    function __construct(){
           
    }

    function ComunasPorRegion($valor){
        $helper = new Helper;
        $query = new Query;
        $valor = $helper::sanitizaInt($valor);
        $list = $query->query('SELECT * FROM comuna where region = '.$valor.' order by glosa_comuna ASC ');
        $listEncode = array();

        foreach ($list as $fila) {
            $fila['glosa_comuna'] = utf8_encode($fila['glosa_comuna']);
            array_push($listEncode, $fila);
        }

        header('Content-Type: application/json');
        echo json_encode($listEncode);
    }

    function Regiones(){
        $query = new Query;
        $list = $query->query('SELECT * FROM region');
        $listEncode = array();
    
        foreach ($list as $fila) {
            $fila['glosa_region'] = utf8_encode($fila['glosa_region']);
            array_push($listEncode, $fila);
        }
    
        header('Content-Type: application/json');
        echo json_encode($listEncode);
    }

    function Candidatos(){
        $query = new Query;
        $list = $query->query('SELECT * FROM candidato');
        $listEncode = array();
    
        foreach ($list as $fila) {
            $fila['nom_candidato'] = utf8_encode($fila['nom_candidato']);
            $fila['app_candidato'] = utf8_encode($fila['app_candidato']);
            $fila['apm_candidato'] = utf8_encode($fila['apm_candidato']);
            array_push($listEncode, $fila);
        }
    
        header('Content-Type: application/json');
        echo json_encode($listEncode);
    }

    function BuscarVotante($valor){
        $query = new Query;
        $stmt = "SELECT * FROM votante INNER JOIN voto on voto.id_votante = votante.id_votante where rut_votante = ".$valor;
        $list = $query->query($stmt);
        $listEncode = array();
    
        foreach ($list as $fila) {
            $fila['nom_ap_votante'] = utf8_encode($fila['nom_ap_votante']);
            $fila['alias_votante'] = utf8_encode($fila['alias_votante']);
            array_push($listEncode, $fila);
        }
    
        header('Content-Type: application/json');
        echo json_encode($listEncode);
    }


}