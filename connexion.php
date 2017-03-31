<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$host="localhost";
$user="root";
$password="";
$dbname="site_radhwen";
$link=mysqli_connect($host,$user,$password) or die ('impossible de se connceter');
mysqli_select_db($link,$dbname);

?>