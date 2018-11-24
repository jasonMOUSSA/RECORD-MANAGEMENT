<?php
if (!function_exists("is_connect")){
    function is_connect()
    {
        $jo = false;
        if (!empty($_SESSION['user'])){
            $jo = true;
        }
        return $jo;
    }
}