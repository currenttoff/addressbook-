<?php

    
    
       

        $connection = mysqli_connect('localhost','root','','loginapp');

        if($connection)
        {
            echo "WE ARE CONNECTED";
        }
        else
        {
            echo "NOT ABLE TO CONNECT";
        }

        //"INSERT INTO users('username','password') VALUES($username,$password)"
        $query="SELECT *FROM users";

        
        $result=mysqli_query($connection,$query);

        if(!$result)
        {
            die('query Failed' );
            //if any mistake in query the it will display this
        }




?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <!--bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="" text="text-center" >READ</h1>
        <div class="col-sm-6">

        <?php
            while($row = mysqli_fetch_assoc($result))
            {   
                //mysqli_fetch_assoc($result) reads column head name
                //mysqli_fetch_row($result) reads column index 

            ?>

            <pre>

            <?php
                print_r($row);
            ?>

            </pre>
            
            <?php
            }
            ?>


        </div>
        
    </div>





</body>