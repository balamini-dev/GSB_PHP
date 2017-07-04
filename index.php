<?php
require_once("include/fct.inc.php"); // require_once permet de inclure une seule fois le fichier. (Contrairement à include, require_once permet de vérifier si le fichier existe si le fichier que l'on souhaite inclure n'existe pas il y aura un message d'erreur).
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
session_start(); // démarer une session qui va permettre de transmettre les variables de pages en pages.
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion'; // $_REQUEST permet de récuperer tous ce qu'il y a dans les pages en (GET, POST, COOKIE)
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'gererFrais' :{
		include("controleurs/c_gererFrais.php");break;
	}
	case 'etatFrais' :{
		include("controleurs/c_etatFrais.php");break; 
	}
	case 'espaceA' :{
		include("controleurs/c_espaceA.php");break; 
	}
	case 'historiqueC' :{
		include("controleurs/historiqueC.php");break; 
	}
	case 'modif' :{
		include("controleurs/c_modif.php");break;
	}
}
include("vues/v_pied.php") ;
?>

