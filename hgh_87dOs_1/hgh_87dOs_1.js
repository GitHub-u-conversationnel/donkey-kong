// JavaScript Document
//constantes
Object.defineProperty (window,'RACINE_SERVEUR',{ value : getBaseURL(), writable: false });
Object.defineProperty (window,'RACINE_SCRIPTS_PHP',{ value : getBaseURL() + "FONCTIONS/PHP/", writable: false });
Object.defineProperty (window,'RACINE_SCRIPTS_JAVASCRIPT',{ value : getBaseURL() + "FONCTIONS/JAVASCRIPT/", writable: false });
Object.defineProperty (window,'RACINE_VISUELS',{ value : getBaseURL() + "DONNEES/VISUELS/", writable: false });

//fonctions
function getBaseURL() {
    var url = location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14)); 
 
    if (baseURL.indexOf('http://localhost') != -1) {
        var pathname = location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);
 
        return baseLocalUrl+'/TEMPLATE_PROJET_PHP/';
    }
    else {
        return baseURL+'/TEMPLATE_PROJET_PHP/';
    }
 
}