<?php
include 'baseurlconfig.php'; 
session_start();
session_unset();
session_destroy(); 
include 'connection.php';
header("Location: ".$baseurl."login.php");
?>