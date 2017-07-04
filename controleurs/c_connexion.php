<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{ // si ($action) = (demandeConnexion) alors on inclut la page v_connexion.php 
							  // ps : tellement la page v_connexion.php est inclué vite alors on ne voit pas en GET
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{    // si ($action) = (valideConnexion) 
		$login = $_REQUEST['login']; // on récupère le login dans la variable $login
		$mdp = $_REQUEST['mdp'];     // on récupère le mdp dans la variable $mdp
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);	//on stock dans la variable $visiteur la méthode getInfosVisiteur
		if(!is_array( $visiteur)){ // si le nom et le prénom n'existe pas dans le tableau associatif, on inclut la page de message d'erreur et la page connexion.
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{ // sinon on se connecte en incluant la page v_sommaire.php
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			$statut = $visiteur['statut'];
			connecter($id,$nom,$prenom,$statut);
			include("vues/v_sommaire.php");

			$d_h = date("d-m-y/H:i");
			$login = $_REQUEST['login'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$insert = PdoGsb::insertInfos($id, $d_h, $login, $ip);
		}
		break;
	}

	#####################################################

#	$id = $visiteur['id'];
#	$d_h = date("d-m-y / H:i");
#	$login = $_REQUEST['login'];
#	$ip = $_SERVER['REMOTE_ADDR'];



	#####################################################
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>