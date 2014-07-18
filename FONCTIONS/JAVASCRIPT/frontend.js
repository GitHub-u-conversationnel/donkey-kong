// JavaScript Document
//Dom
//jQuery

//var
//param formulaires
nom = "";
prenom = "";
societe = "";
fonction = "";
telephone = "";
email = "";
adresse = "";
code_postal = "";
ville = "";

tableau_des_erreurs = new Array();

message_erreur = new Array("Vous êts déjà enregistré !");

//url/texte
message_partage = new Array(RACINE_SERVEUR, "Je%20participe%20%C3%A0%20la%20conf%C3%A9rence%20LA%20BAISSE%20DU%20REACH%20SUR%20FACEBOOK%20QUELLES%20ALTERNATIVES%20?%20organis%C3%A9e%20par%20%40Conversationnel");

//fonctions
//test syntaxe mail
function tester_email(){
	
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

		if(reg.test(email))
			{
				return(true);
			}
		else
			{
				return(false);
			}
		
}
//gestion des exceptions
function determiner_erreur(){
	
	if(nom == ""){
			tableau_des_erreurs.push(1);
		}
		if(prenom == ""){
			tableau_des_erreurs.push(2);
		}
		if(societe == ""){
			tableau_des_erreurs.push(3);
		}
		if(fonction == ""){
			tableau_des_erreurs.push(4);
		}
		//if(telephone == ""){
			//tableau_des_erreurs.push(5);
		//}
		if(tester_email() == false){
			tableau_des_erreurs.push(6);
		}
		//if(adresse == ""){
		//	tableau_des_erreurs.push(7);
		//}
		//if(code_postal == ""){
		//	tableau_des_erreurs.push(8);
		//}
		if(ville == ""){
			tableau_des_erreurs.push(9);
		}
		
}


function initialiser_erreur(couleur){
	
		tableau_des_erreurs = new Array();

		jQuery("#nom").css({"background":"" + couleur + ""});
		jQuery("#prenom").css({"background":"" + couleur + ""});
		jQuery("#societe").css({"background":"" + couleur + ""});
		jQuery("#fonction").css({"background":"" + couleur + ""});
		jQuery("#telephone").css({"background":"" + couleur + ""});
		jQuery("#email").css({"background":"" + couleur + ""});
		jQuery("#adresse").css({"background":"" + couleur + ""});
		jQuery("#code_postal").css({"background":"" + couleur + ""});
		jQuery("#ville").css({"background":"" + couleur + ""});
		
}

function afficher_erreur(){
	
	for(var i = 0; i < tableau_des_erreurs.length; i++){
		
		//alert(tableau_des_erreurs[i]);
		
		if(tableau_des_erreurs[i] == 1){
			jQuery("#nom").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 2){
			jQuery("#prenom").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 3){
			jQuery("#societe").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 4){
			jQuery("#fonction").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 5){
			jQuery("#telephone").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 6){
			jQuery("#email").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 7){
			jQuery("#adresse").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 8){
			jQuery("#code_postal").css({"background":"red"});
		}
		if(tableau_des_erreurs[i] == 9){
			jQuery("#ville").css({"background":"red"});
		}
	}
	
}

//loader
function afficher_loader(){
	
	jQuery("#loader_ajax").css({"opacity":"1"});
	
}

function supprimer_loader(){
	
	jQuery("#loader_ajax").css({"opacity":"0"});
	
}

//partages
function affichage_popup(nom_de_la_page)
{
	popup = window.open (nom_de_la_page, "", config='height=200, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
	popup.focus();
}
//ev
//test
	jQuery( document ).ready( function ($) {
		
		jQuery("#test_jq").on( "click", function() {
		alert(RACINE_SERVEUR);
			
	});
	
	jQuery("#bt_formulaire").on( "click", function() {
			
		initialiser_erreur("white");
		
		nom = jQuery("#nom").val();
		prenom = jQuery("#prenom").val();
		societe = jQuery("#societe").val();
		fonction = jQuery("#fonction").val();
		telephone = jQuery("#telephone").val();
		email = jQuery("#email").val();
		adresse = jQuery("#adresse").val();
		code_postal = jQuery("#code_postal").val();
		ville = jQuery("#ville").val();
		
		//alert(nom + prenom + societe + fonction + telephone + email + adresse + code_postal + ville);
		
		determiner_erreur();
		
		//alert(tableau_des_erreurs.length);
		
			if(tableau_des_erreurs.length <= 0){
				
				initialiser_erreur("green");
				
				afficher_loader();
				
				//alert(RACINE_SCRIPTS_PHP + "appel_Classe_enregistrer_invite.php");
				
				//call ajax
				jQuery.ajax({
  					type: "GET",
 					url: RACINE_SCRIPTS_PHP + "appel_Classe_enregistrer_invite.php",
  					data: { 
						nom : nom,
						prenom : prenom,
						societe : societe,
						fonction : fonction,
						telephone : telephone,
						email : email,
						adresse : adresse,
						code_postal : code_postal,
						ville : ville
					}
  					}).done(function( msg ) {
				
						supprimer_loader();
						
						var reponse = eval('('+ msg +')');
						
						//alert(reponse);
						
						if(reponse == true || reponse == false){
							
							if(reponse == true){
								jQuery("#popup").css({"display":"block"});
							}
							else{
								alert(message_erreur[0]);
							}
								
							
						}
						else{
							alert(reponse);
						}
			
					});
			}
			else{
				
				afficher_erreur();
			}
	
	});
	
	//fermer popup
	jQuery("#fermer_poup").on( "click", function() {
		
		jQuery("#popup").css({"display":"none"});
			
	});
	
	//partages
	jQuery("#partage_page_tw").on( "click", function() {
		
		  affichage_popup("http://twitter.com/share?url=" + message_partage[0] + "&text=" + message_partage[1]);
			
	});
	
	jQuery("#partage_page_facebook").on("click", function(){
		
		 affichage_popup("https://www.facebook.com/sharer/sharer.php?p[url]=" + message_partage[0]);

	});
	
	 jQuery("#partage_page_linkedin").on("click", function(){
		 
		 affichage_popup("https://www.linkedin.com/cws/share?url="+ message_partage[0]);
		 
	});
	
//fin dom
});