<?php

function incFile($filepath){
    $b = substr(BASEPATH, 0, -1);
    $domain = explode('/', $b);
    $path = end($domain);
    $pathlen = strlen($path);
    $lastpath = substr($b, 0, -($pathlen));

    $fpath = include($lastpath.'views'.$filepath.'php');
    return $fpath;
    //return true;
}


date_default_timezone_set(TIMEZONE);

function setId($name, $id){
	$_SESSION[$name] = $id;
	return $_SESSION[$name];
}

function getId($name){
	return $_SESSION[$name];
}
