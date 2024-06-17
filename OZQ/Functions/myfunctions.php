<?php
session_start();
include ('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id ='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '0'";
    return $query_run = mysqli_query($con, $query);
}

function getDayOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE Date = CURRENT_DATE";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $massage)
{
    $_SESSION['message'] = $massage;
    header('Location: ' .$url);
    exit();
}

?>