<?php
//espace de nom
namespace FONCTIONS\PHP;
//import
class Classe_application{
	//variables
	private $une_String = "une string";
	private $un_Tableau = array('1','2','3','4');
	private $un_Json = array('1','2','3','4');
	private $connexion_db;
	//
	public function __construct(){
			try {
				
				$dbh = new \PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USER, DB_PASSWORD);
				$this->connexion_db = $dbh;
				//echo 'connexion à la base de donnée établie !';
			} 
			catch(PDOException $e) {
				echo $e->getMessage();
				die();
			
			}
		//fin constructeur
	}
	//fonctions
	public function retourne_une_String(){
		return $this->une_String;
	}
	public function retourne_un_Tableau(){
		return $this->un_Tableau;
	}
	public function retourne_un_Json(){
		return $this->un_Json;
	}
	public function retourne_un_parametre(){
		return DB_USER;
	}
	public function enregistrer_invite($nom, $prenom, $societe, $fonction, $telephone, $email, $adresse, $code_postal, $ville){
		
		try{
				
				$concordance = 0;
				
				$sqlquery = 'SELECT * FROM invites';
				$sth = $this->connexion_db->query($sqlquery);
				$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
				
					foreach($result as $item) {
						
						if($item['email'] == $email){
							
							$concordance++;
							
						}
							
					}
					
					if($concordance <= 0){
					
						$sqlquery = 'INSERT INTO invites
							(nom, prenom, societe, fonction, telephone, email, adresse, code_postal, ville) 
							VALUES ("'.$nom.'", "'.$prenom.'", "'.$societe.'", "'.$fonction.'", "'.$telephone.'", "'.$email.'", "'.$adresse.'", "'.$code_postal.'", "'.$ville.'")';
						$this->connexion_db->exec($sqlquery);
						
						//envoi mail
						//Create a new PHPMailer instance
						

						$mail = new \PHPMailer();

						//Tell PHPMailer to use SMTP
						$mail->isSMTP();

						//Enable SMTP debugging
						// 0 = off (for production use)
						// 1 = client messages
						// 2 = client and server messages
						$mail->SMTPDebug = 0;

						//encodage
						$mail->CharSet = 'UTF-8';

						//Ask for HTML-friendly debug output
						$mail->Debugoutput = 'html';

						//Set the hostname of the mail server
						$mail->Host = 'smtp.gmail.com';

						//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
						$mail->Port = 587;

						//Set the encryption system to use - ssl (deprecated) or tls
						$mail->SMTPSecure = 'tls';

						//Whether to use SMTP authentication
						$mail->SMTPAuth = true;

						//Username to use for SMTP authentication - use full email address for gmail
						$mail->Username = "welcome@conversationnel.fr";

						//Password to use for SMTP authentication
						$mail->Password = "GfDs_6qA7_bc54qr_ZE";

						//Set who the message is to be sent from
						$mail->setFrom('welcome@conversationnel.fr', 'Agence Conversationnel');

						//Set an alternative reply-to address
						$mail->addReplyTo('rcoulet@conversationnel.fr', 'Robin COULET');
						$mail->addReplyTo('acoulet@conversationnel.fr', 'Arnault COULET');

						//Set who the message is to be sent to
						$mail->addAddress($email);

						//Set the subject line
						$mail->Subject = 'Confirmation d\'inscription : La baisse du Reach sur Facebook, quelles alternatives ?';

						//Read an HTML message body from an external file, convert referenced images to embedded,
						//convert HTML into a basic plain-text alternative body
						$mail->msgHTML('<p>'.$prenom.' '.$nom.'<p>Merci de votre inscription à la conférence « La baisse du Reach sur Facebook, quelles alternatives ? ». Nous sommes heureux de vous compter parmi nous !</p><p>Rendez-vous le 26 juin 2014, de 8h30 à 10h, au Collège Hotel, 5 Place Saint-Paul 69005 Lyon, pour faire parler de vous sur les réseaux sociaux.</p><p>Excellente journée, </br>L’Agence Conversationnel</p>');

						//Replace the plain text body with one created manually
						$mail->AltBody = $prenom.' '.$nom.' Merci de votre inscription à la conférence « La baisse du Reach sur Facebook, quelles alternatives ? ». Nous sommes heureux de vous compter parmi nous ! Rendez-vous le 26 juin 2014, de 8h30 à 10h, au Collège Hotel, 5 Place Saint-Paul 69005 Lyon, pour faire parler de vous sur les réseaux sociaux. Excellente journée,L’Agence Conversationnel';

					//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');
					//
					
					//send the message, check for errors
						if (!$mail->send()) {
  							return 'Exception levée : '.$mail->ErrorInfo;
						} else {
 							return true;
						}
						
						//return true;
					}
					else{
						
						return false;
						
					}
			}
			catch (Exception $e) {
				
   				return 'Exception levée : '.$e->getMessage();
				
			}
			
	}
	
	public function recuperer_nb_invites(){
		
		$sqlquery = 'SELECT * FROM invites';
				$sth = $this->connexion_db->query($sqlquery);
				$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
				return sizeof($result);
		

	}
	
	//fin de classe
}
