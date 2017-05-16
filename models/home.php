<?php

class HomeModel{
    public function Index(){
        $viewmodel= new HomeModel();
        $this->ReturnView($viewmodel->Index(), true);
    }
}