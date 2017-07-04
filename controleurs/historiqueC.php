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

<h2><center> Historique connexions des visiteurs </center></h2>
<?php
include("vues/v_sommaire.php");


$affich = PdoGsb::affichInfos();
#######################################################################
?>

<table>
    <tr>
        <th>id</th>
        <th>date / heure</th>
        <th>login</th>
        <th>IP</th>
    </tr>
<?php
while ($donnees = mysql_fetch_assoc($affich)) {
	?>
	<tr>
        <td><?php echo $donnees['id'];?></td>
        <td><?php echo $donnees['date_heure'];?></td>
        <td><?php echo $donnees['login'];?></td>
        <td><?php echo $donnees['ip'];?></td>
    </tr>
<?php
}
?>
</table>

<!--####################################################################





foreach($affich as $unelement) # La boucle foreach parours le resultat de la requette "$user" la variable "$unvisiteur" sert d'incrémenter pour parcourir la requette.
{

	echo "<p> $unelement </p>";
}

?>
-->