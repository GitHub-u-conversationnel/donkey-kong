<?php
//import
require_once('../../hgh_87dOs_1/hgh_87dOs_1.php');
require_once('../../_autoload.php');
require_once('../../LIBRAIRIES/PHP/PHPMailer-master/class.phpmailer.php');
require_once('../../LIBRAIRIES/PHP/PHPMailer-master/class.smtp.php');
require_once('../../LIBRAIRIES/PHP/PHPMailer-master/class.pop3.php');
//var
$classe_application = new FONCTIONS\PHP\Classe_application();
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$societe = $_GET['societe'];
$fonction = $_GET['fonction'];
$telephone = $_GET['telephone'];
$email = $_GET['email'];
$adresse = $_GET['adresse'];
$code_postal = $_GET['code_postal'];
$ville = $_GET['ville'];
//function
//ev
echo json_encode($classe_application->enregistrer_invite($nom, $prenom, $societe, $fonction, $telephone, $email, $adresse, $code_postal, $ville));