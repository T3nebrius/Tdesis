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
date_default_timezone_set('America/Santiago');

class Grabar{
    public $idVotante;

    function __construct(){
           
    }

    function GrabarVotanteVoto($nom, $ap, $al, $rt, $rd, $em, $reg, $com, $cand, $wb , $tv, $rs, $am){
        $query = new Query;
        $nombre = $nom." ".$ap;
        $stmt = "INSERT INTO votante (nom_ap_votante, alias_votante, rut_votante, dv_votante, email_votante, region_votante, comuna_votante) VALUES ('$nombre', '$al', '$rt', '$rd', '$em', '$reg', '$com')";
        $query->insert($stmt);

    }

    function GrabarVoto($idVotante, $idCandidato){
        $fechaVoto = date('Y-m-d H:i:s');
        $query = new Query;
        $stmt = "INSERT INTO voto (id_votante, id_candidato, fecha_voto) VALUES ($idVotante, $idCandidato, '$fechaVoto')";
        $query->insert($stmt);
    }
    function GrabarContacto($idVotante, $wb, $tv, $rs, $am){     
        $variables = array('wb' => $wb, 'tv' => $tv, 'rs' => $rs, 'am' => $am);
        foreach ($variables as $nombre => $valor) {
            if ($valor !== 0) { 
                $query = new Query;
                $stmt = "INSERT INTO contacto (id_votante, id_contacto) VALUES ($idVotante, $valor)";
                $query->insert($stmt);
            }
        }
    }

    function buscaVotanteInsertado(){
        $query = new Query; 
        $stmt = "select max(id_votante) id_votante from votante limit 1";
        $list = $query->query($stmt);
        return $list[0]['id_votante'];
    }
    
}

$grabar = new Grabar;
$nom    =       $_POST['nombre'];
$ap     =       $_POST['apellido'];
$al     =       $_POST['alias'];
$rt     =       $_POST['rut'];
$rd     =       $_POST['rutDv'];
$em     =       $_POST['emailtxt'];
$reg    =       $_POST['region'];
$com    =       $_POST['comuna'];
$cand   =       $_POST['candidato'];
if (isset($_POST['web'])){$wb       =       1;}else{$wb = 0;};
if (isset($_POST['tv'])){$tv        =       2;}else{$tv = 0;};
if (isset($_POST['redes'])){$rs     =       3;}else{$rs = 0;};
if (isset($_POST['amigo'])){$am     =       4;}else{$am = 0;};





/*validaciones Back*/
$largonombre = strlen($nom);
$largoapellido = strlen($ap);
$largoalias = strlen($al);
$largoemail = strlen($em);

if($largonombre > 0 && $largoapellido > 0 && $largoalias >= 6 && $largoemail >= 8){

    $grabar->GrabarVotanteVoto($nom, $ap, $al, $rt, $rd, $em, $reg, $com, $cand, $wb , $tv, $rs, $am);
    $idVotante = $grabar->buscaVotanteInsertado();
    $grabar->GrabarVoto($idVotante, $cand);
    $grabar->GrabarContacto($idVotante, $wb, $tv, $rs, $am);
    header("Location: index.php");
    exit();
}else{
    header("Location: error.php");
    exit();
}

