<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mystore";

    // create database connection
    $con = mysqli_connect($host,$username,$password,$database);

    // chech database connection
    if(!$con)
    {
        die("Connection failed:". mysqli_connect_error());
    }
?>