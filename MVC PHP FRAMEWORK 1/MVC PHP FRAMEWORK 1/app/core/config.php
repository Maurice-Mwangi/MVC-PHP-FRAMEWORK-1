<?php

if($_SERVER['SERVER_NAME'] === 'localhost'){
    define('ROOT', 'http://localhost/public/');
    define('DBNAME', 'mvc_database');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
}else{
    define('ROOT', '');
    define('DBNAME', '');
    define('DBHOST', '');
    define('DBUSER', '');
    define('DBPASS', '');
}

define('APP_NAME', 'My Website MVC');
define('DESCRIPTION', "The Simplest MVC I use");

define('DEBUG', true);