<?php

    include('functions.php');
    include('connection.php');

    createData();
    


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
        <div class="col-sm-6">
            <h1 class="" text="text-center" >CREATE</h1>
            <form action="login_create.php" method="post">
                <div class="group-form">
                    <label for="username" >USERNAME</label>
                    <input type="text" class="form-control" name="username">

                    <label for="password" >PASSWORD</label>
                    <input type="password" class="form-control" name="password">

                    <input type="submit" name="submit" value="CREATE" class="btn btn-outline-primary" >

                </div>

                

            </form>

        </div>


    </div>





</body>