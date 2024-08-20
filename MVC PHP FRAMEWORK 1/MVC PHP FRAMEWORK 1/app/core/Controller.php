<?php

trait Controller 
{
    public function view($name)
    {
        $filename = "../app/views/".$name.".view.php";
        if(file_exists($filename))
            require $filename;
        else{
            $filename = "../app/views/Null.view.php";
            require $filename;
        }
    }
}