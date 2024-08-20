<?php

class App
{
    private $controller = 'Home';
    private $method = 'index';

    private function split_url(){
        $url = $_GET['url'] ?? 'home';
        $url = explode("/", trim($url, "/"));
        return $url;
    }   
    
    public function loadController(){
        $url = $this->split_url();
        $filename = "../app/controllers/" . ucfirst($url[0]) . ".php";

        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        } else {
            require "../app/controllers/Not_Exist.php";
            $this->controller = 'Not_Exist';
        }

        // this is what calls the methods in controllers
        $controller = new $this->controller;

        if(!empty($url[1])){
            if(method_exists($controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        call_user_func([$controller, $this->method], []);
            
    }
}