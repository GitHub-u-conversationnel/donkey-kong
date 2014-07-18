<?php
//import
require_once('../../hgh_87dOs_1/hgh_87dOs_1.php');
require_once('../../_autoload.php');
//var
$classe_application = new FONCTIONS\PHP\Classe_application();
//function
//ev
//retourne une string
echo $classe_application->retourne_une_String();
echo '</br>';
//retourne un tableau
var_dump($classe_application->retourne_un_Tableau());
echo '</br>';
//retourne un json
echo json_encode($classe_application->retourne_un_Json());
echo '</br>';
//retourne un parametre
echo $classe_application->retourne_un_parametre();
//retourne tous les parmetres

