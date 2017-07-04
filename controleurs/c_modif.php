<head>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
</head>

<h2><center> Moodifier mes infos </center></h2>
<?php
include("vues/v_sommaire.php");
$idvisiteur = $_SESSION['idVisiteur'];
$infosV = PdoGsb::getAllInfos($idvisiteur);

?>

<table>
   <tr>
       <td><b>Nom</b></td>
       <td><?php echo $infosV['nom'].' '; ?></td>
       <td>
       	<form action="" method="post">
			<p>
		    <input type="text" name="nom" />
		    <input type="submit" value="Modifier" name="ok_nom"/>
			<?php
if (isset($_POST['ok_nom']) AND ($_POST['nom']) != ""){
	
	$nom = $_POST['nom'];
	$modifNom = PdoGsb::modifInfosNom($nom, $idvisiteur);
}elseif (isset($_POST['ok_nom']) AND ($_POST['nom']) == ""){
	echo('<span class= "erreur">valeur nul !</span>');
}?>
		</p>
		</form>
       </td>
   </tr>
   <tr>
       <td><b>Prenom</b></td>
       <td><?php echo $infosV['prenom'].' '; ?></td>
       <td>
       <form action="" method="post">
			<p>
		    <input type="text" name="prenom" />
		    <input type="submit" value="Modifier" name ="ok_prenom"/>
			<?php
if (isset($_POST['ok_prenom']) AND ($_POST['prenom']) != ""){
	
	$prenom = $_POST['prenom'];
	$modifPrenom = PdoGsb::modifInfosPrenom($prenom, $idvisiteur);
}elseif (isset($_POST['ok_prenom']) AND ($_POST['prenom']) == ""){
	echo('<span class= "erreur">valeur nul !</span>');
}?>
		</p>
		</form>
       </td>
   </tr>
   <tr>
       <td><b>Adresse</b></td>
       <td><?php echo $infosV['adresse'].' '; ?></td>
       <td> <form action="" method="post">
			<p>
		    <input type="text" name="adresse" />
		    <input type="submit" value="Modifier" name="ok_adresse" />
			<?php
if (isset($_POST['ok_adresse']) AND ($_POST['adresse']) != ""){
	
	$adresse = $_POST['adresse'];
	$modifAdresse = PdoGsb::modifInfosAdresse($adresse, $idvisiteur);
}elseif (isset($_POST['ok_adresse']) AND ($_POST['adresse']) == ""){
	echo('<span class= "erreur">valeur nul !</span>');
}?>
		</p>
		</form>
		 </td>
   </tr>
   <tr>
       <td><b>Ville</b></td>
       <td><?php echo $infosV['ville'].' '; ?></td>
       <td> <form action="" method="post">
			<p>
		    <input type="text" name="ville" />
		    <input type="submit" value="Modifier" name="ok_ville" />
			<?php
if (isset($_POST['ok_ville']) AND ($_POST['ville']) != ""){
	
	$ville = $_POST['ville'];
	$modifVille = PdoGsb::modifInfosVille($ville, $idvisiteur);
}elseif (isset($_POST['ok_ville']) AND ($_POST['ville']) == ""){
	echo('<span class= "erreur">valeur nul !</span>');
}?>
		</p>
		</form>
		 </td>
   </tr>
   <tr>
       <td><b>CP</b></td>
       <td><?php echo $infosV['cp'].' '; ?></td>
       <td> <form action="" method="post">
			<p>
		    <input type="text" name="cp" />
		    <input type="submit" value="Modifier" name="ok_cp" />
		    <?php
if (isset($_POST['ok_cp']) AND ($_POST['cp']) != ""){
	
	$cp = $_POST['cp'];
	$modifCp = PdoGsb::modifInfosCp($cp, $idvisiteur);
}
elseif (isset($_POST['ok_cp']) AND ($_POST['cp']) == ""){
	echo('<span class= "erreur">valeur nul !</span>');
}?>
			</p>
		</form>
		</td>
   </tr>
</table>





