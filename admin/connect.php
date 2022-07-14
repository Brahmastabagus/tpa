<?php
    //connect database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "tpa";

    $dbcon = new mysqli($host, $user, $pass, $dbname) or die($dbcon-> error);
?>