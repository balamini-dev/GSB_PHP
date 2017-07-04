<?php

include("vues/v_sommaire.php");

?>
<center><h2>Espace administrateur</h2></center>
	<form action="" method="post">
	<select name="infosvisiteur">
	<?php 
	$users = PdoGsb::getUser(); # La variable "$users" contient la méthode "getUser" de la class "PdoGsb" . La méthode "getUser" contient la requette.

foreach($users as $unvisiteur) # La boucle foreach parours le resultat de la requette "$user" la variable "$unvisiteur" sert d'incrémenter pour parcourir la requette.
{


	if($unvisiteur['id']==$_POST['infosvisiteur']){
		echo'<option value="'.$unvisiteur['id'].'" selected>'.$unvisiteur['nom'].' '.$unvisiteur['prenom'].'</option>';
	}else{
		echo'<option value="'.$unvisiteur['id'].'">'.$unvisiteur['nom'].' '.$unvisiteur['prenom'].'</option>';
	}
	
}
?>
</select>
<input type="submit" name="envoyerU">



	</form>

<?php

if (isset($_POST['infosvisiteur'])){

	$idvisiteur = $_POST['infosvisiteur'];
	$visiteurs = PdoGsb::getVisiteur($idvisiteur);
	$nomvisiteur = $visiteurs['nom'];
	$prenomvisiteur = $visiteurs['prenom'];
	$idvisiteur = $visiteurs['id'];

}

	

// Traitement du form
if(isset($_POST['envoyerU']))
{
	$date = $pdo->getLesMoisDisponibles($idvisiteur);

	if($date != null)
	{	
	echo'
	<form action="" method="post">
	<select name="mois">
	';

	foreach($date as $unedate)
	{
	echo'<option value="'.$unedate['mois'].'">'.$unedate['numMois'].'/'.$unedate['numAnnee'].' </option>';
	}
	echo '<input type="hidden" name="infosvisiteur" value="'.$idvisiteur.'" />';

	echo'
	</select>
	<input type="submit" name="envoyerD">';
	}else{
		echo 'Pas de fiches de frais disponible pour ce visiteur.';
	}
}

?>
</form>

<?php
if(isset($_POST['envoyerD']))
{
	$leMois = $_POST['mois'];

	$idvisiteur = $_POST['infosvisiteur'];


	$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idvisiteur,$leMois);

	$lesFraisForfait= $pdo->getLesFraisForfait($idvisiteur,$leMois);
	$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idvisiteur,$leMois);

	$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);



		include("vues/v_etatFrais.php");
}

?>