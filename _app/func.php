<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "connexion.dao.php";
$db = Connexion::getConnexion();
if (!function_exists('imgFromdir')){
    function imgFromDir($dir){
        $dir = 'img/'.$dir.'/';
        $result = [];
        $i = 0;
        if (is_dir($dir)){
            if ($opendir = opendir($dir)){
                while (($file = readdir($opendir)) !== false){
                    $ext = new SplFileInfo($file);
                    $ext = $ext->getExtension();
                    if ($ext == 'jpg' or $ext == 'png' or $ext == 'bmp'){
                        $result[$i] = $dir.$file;
                        $i++;
                    }
                }
            }
        }
        return $result;
    }
}
if (!function_exists("e")){
    function e($string)
    {
        return strtolower(utf8_encode($string));
    }
}

