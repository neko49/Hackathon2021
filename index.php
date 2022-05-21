<?php



session_start();
//recuperation du fichier de configuration du site.
require_once 'config/conf.inc.php';
require_once 'config/autoload.php';
// Connexion à la BdD
$Db = new DbTools();


//var_dump($Db);
//Recupération de l'URI du site pour le parsser et récupérer la page à afficher et les variables
$url = $_SERVER['REQUEST_URI'];

//parse_str($url, $output);
//var_dump($output);
$pageInfos = explode('/',$url);

//$pageTest = $_GET['page'];
//Recuperation de la variable page de l'url
$pageTest = filter_input(INPUT_GET, 'page',FILTER_SANITIZE_MAGIC_QUOTES, FILTER_SANITIZE_STRING);

$page = $pageInfos[1];
//récupérer l'id de l'url deuxieme /
$urlId = $pageInfos[2];


$pageName = ($page != '')? $page.'.php' : 'home.php';

if(file_exists('controllers/'.$pageName)){
   
include_once 'controllers/'.$pageName;
}
else{
    //changer pour le nom de la page d'accueil 
    include_once 'controllers/home.php';
}