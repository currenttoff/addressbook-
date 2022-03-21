<?php

$server = "sql112.epizy.com";
$username = "epiz_31326691";
$password = "jXzNiPR4Xb1"; //xampp no password
$db = "epiz_31326691_db_clientaddressbook";//db_clientaddressbook

$conn = mysqli_connect($server,$username,$password,$db);


if(!$conn)
{
    die('CONNECTION FAILED'.mysqli_connect_error());
}

?>