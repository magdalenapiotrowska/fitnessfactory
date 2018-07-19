<?php
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "fitness";
  /*ogólny plik zawierający namiary na nasza baze danych w phpmyadmin"*/  
    /*ogólny plik zawierający namiary na nasza baze danych w phpmyadmin"*/  
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);

    if (!$con) {
        die("connection failes: ".mysqli_connect_error());
    }
?>