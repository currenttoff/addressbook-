<?php

$server = "localhost";
$username = "root";
$password = ""; //xampp no password
$db = "db_clientaddressbook";//db_clientaddressbook

$conn = mysqli_connect($server,$username,$password,$db);


if(!$conn)
{
    die('CONNECTION FAILED'.mysqli_connect_error());
}

?>