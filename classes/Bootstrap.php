<?php


//Classe qui controlle la configuration des requetes du site web.
class Bootstrap{
    private $controller;
    private $action;
    private $request;

    public function __construct($request){
        $this->request= $request;
        //Si la requete des controlleur est vide, le definir à 'home' par defaut.
        if($this->request['controller']==null){
            $this->controller= 'home';
        }else{
        //Sinon l'assigner a peu importe le controlleur demandé.
            $this->controller= $this->request['controller'];
        }
        //Si la requete d'action est vide, assigner par defaut à index.
        if($this->request['action']==null){
            $this->action= 'index';
        }else{
            $this->action=$this->request['action'];
        }
    }
    public function createController(){
        //Vérifier la classe
        if(class_exists($this->controller)){
            $parents= class_parents($this->controller);
        //Vérifier si la classe est extended
            if(in_array('Controller', $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else{
                    //Informer que la méthode n'existe pas
                    echo "<h1>Method does not exist</h1>";
                    return;
                }
            }else{
                    echo "<h1>The base controller was not found</h1>";
                    return;
            }
        }else{
            echo "<h1>The controller class doesn't exist</h1>";
            return;
        }
    }
}