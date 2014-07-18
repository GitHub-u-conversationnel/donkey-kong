<?php
//import
require_once('hgh_87dOs_1/hgh_87dOs_1.php');
require_once('./_autoload.php');
//var
$classe_application = new FONCTIONS\PHP\Classe_application();
//function
//ev
require_once('MODULES/doctype.php');
require_once('MODULES/en_tete.php');
//body
$nb_invites =  $classe_application->recuperer_nb_invites();
	if($nb_invites >= MAX_GUEST){
		echo '<h2>les inscriptions à la conférence <b>sont désormais closes</b></h2>';
	}
	else{
echo '
                <h2><b>formulaire d\'inscription</b></h2>
                <form action="">
                    <p style="font-weight: 300; font-style: normal; font-size: 20px;">Afin de vous inscrire à cette conférence, veuillez remplir le formulaire suivant. Attention les inscriptions sont limitées à 80 places. Tout les champs sont obligatoires.</p>
                    <input type="text" id="nom" class="odd" placeholder="Votre NOM"/>
                    <input type="text" id="prenom" placeholder="Votre PRÉNOM"/>
                    <input type="text" id="societe" class="odd" placeholder="Société"/>
                    <input type="text" id="fonction" placeholder="Fonction"/>
                    <input type="text" id="telephone" class="odd" placeholder="Téléphone"/>
                    <input type="text" id="email" placeholder="E-mail"/>
                    <input id="adresse"  type="text" placeholder="Addresse"/>
                    <input type="text" id="code_postal" class="odd" placeholder="Code postal"/>
                    <input type="text" id="ville" placeholder="Ville"/>
                    <input type="button" id="bt_formulaire" value="valider" class="button round"/>
                    <span id="loader_ajax" style="opacity:0;"><img src="DONNEES/VISUELS/ajax-loader.gif" alt="visuel loader"/></span>
                </form>
                <div id="popup" style="display:none;">
                    <div class="cartouche-popup" >
                        <span id="fermer_poup"></span>
                        <h3>merci de votre participation !</h3>
                        <p>Faites connaître votre participation à la conférence MAKE ME REACH à votre réseau :</p>
                        <span class="button round" id="partage_page_facebook"></span>
                        <span class="button round" id="partage_page_tw"></span>
                        <span class="button round" id="partage_page_linkedin"></span>
                    </div>
                </div> 
';
	}
//
require_once('MODULES/pied_de_page.php');