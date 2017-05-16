<?php
//Inclure les fichiers nécessaires
require ('classes/Bootstrap.php');
require ('classes/Controller.php');
require ('classes/Model.php');

require('config.php');

//Controlleurs
require ('controllers/Home.php');
require ('controllers/Shares.php');
require ('controllers/Users.php');


//Controlleurs
require ('models/home.php');
require ('models/share.php');
require ('models/user.php');


$bootstrap= new Bootstrap($_GET);
$controller= $bootstrap->createController();

if($controller){
    $controller->executeAction();
}