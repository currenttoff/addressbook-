<?php
include('connection.php');

function createData()
{
    if(isset($_POST['submit']))
    {
        global $connection;
        $username= $_POST['username'];
        $password= $_POST['password'];

        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);

        //encrypting password
        $hashFormat = "$2y$10$";
        $salt="iusesomecrazystrings22";
        $hash_and_salt=$hashFormat.$salt;
        $password=crypt($password,$hash_and_salt);

        $query="INSERT INTO users(username,password) VALUES('$username','$password')";

       

        
        $result=mysqli_query($connection,$query);

        if(!$result)
        {
            die('query Failed <hr> ' );
            //if any mistake in query the it will display this
        }
        else
        {
            echo "RECORD CREATED <hr>";
        }


        
    }

}


function showAllData()
{
    //or declare global connection and take it include out of function
    global $connection;

    //"INSERT INTO users('username','password') VALUES($username,$password)"
    $query="SELECT *FROM users";

    //include('connection.php');    
    
    $result=mysqli_query($connection,$query);

    if(!$result)
    {
        die('query Failed'.mysqli_error($connection));
        //if any mistake in query the it will display this
    }



    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        echo "<option value='$id'>$id</option>"; 

    }
}


function updateData()
{
        global $connection;
    
        $username=$_POST['username'];
        $password=$_POST['password'];
        $id=$_POST['id'];

        $query = "UPDATE users SET username='$username',password='$password' where id='$id'";

        $result =mysqli_query($connection,$query);

        if(!$result)
        {
            die('QUERY  FAILED'.mysqli_errno($connection));
        }
        else
        {
            echo('RECORD UPDATED');
        }


    
}


function deleteData()
{
        global $connection;
    
        $username=$_POST['username'];
        $password=$_POST['password'];
        $id=$_POST['id'];

        $query = "DELETE FROM users where id='$id'";

        $result =mysqli_query($connection,$query);

        if(!$result)
        {
            die('QUERY  FAILED'.mysqli_errno($connection));
        }
        else
        {
            echo('RECORD DELETED');
        }


    
}



?>