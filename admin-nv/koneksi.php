<?php

$host   = 'localhost';
$user   = 'root';
$pass   =  '';
$db     = 'sp_mata20';
$link   = mysqli_connect($host,$user,$pass,$db);

if(!$link){
    die('ada error' . mysqli_connect_error());
}

?>