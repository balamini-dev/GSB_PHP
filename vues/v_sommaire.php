    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Visiteur :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
      <p></p>
           <li class="smenu">
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <p></p>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
           <p></p>
           <?php
           if($_SESSION['statut'] == 1){
            echo'
            <li class="smenu">
              <a href="index.php?uc=espaceA&action=espaceA" title="Espace administrateur">Espace administrateur</a>
              <p></p>
           </li>';
           }

           if($_SESSION['statut'] == 1){
            echo'
            <li class="smenu">
              <a href="index.php?uc=historiqueC&action=historiqueC" title="Historique connexion">Historique connexion</a>
              <p></p>
           </li>';
           }
           ?>

          <li class="smenu">
              <a href="index.php?uc=modif&action=modif" title="Modifier fiche de frais ">Modifier mes infos</a>
           </li>
           <p></p>

 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    