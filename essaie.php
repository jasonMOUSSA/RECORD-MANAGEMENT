<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

var_dump($_SESSION);
