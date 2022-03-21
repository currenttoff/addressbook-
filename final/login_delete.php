<!--refactored login_update_r.php -->


<?php
        include('connection.php');
        include('functions.php');

        if(isset($_POST['submit']))
        {
            deleteData();

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
        <h1 class="" text="text-center" >DELETE</h1>
        <div class="col-sm-6">
        <form action="login_delete.php" method="post">
                <div class="group-form">
                    <label for="username" >USERNAME</label>
                    <input type="text" class="form-control" name="username">

                    <label for="password" >PASSWORD</label>
                    <input type="password" class="form-control" name="password">

                    <hr>
                    <select name="id" id="">

                        <?php
                           
                          showAllData();


                        ?>


                       

                    </select>

                    <hr>
                    

                    <input type="submit" name="submit" value="DELETE" class="btn btn-outline-danger" >

                </div>

                

            </form>
        


        </div>
        
    </div>





</body>