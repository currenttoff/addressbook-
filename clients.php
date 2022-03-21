<?php
session_start();
global $alertMessage;
//if user not logged in
if(!$_SESSION['loggedInUser'])
{
    header("Location : login.php");
}

//connect to database
include('includes/connection.php');

//query and Result
$query = "SELECT * FROM clients";
$result = mysqli_query($conn,$query);

//check for query string
if(isset($_GET['alert']))
{
    //new clients added
    if($_GET['alert']=="success")
    {
        $alertMessage = '<div class="alert alert-success">New CLIENT ADDED <a class="close" data-dismiss="alert">&times;</a></div>';

    }
    elseif($_GET['alert']=='updatesuccess')
    {
        $alertMessage = '<div class="alert alert-success">CLIENT UPDATED <a class="close" data-dismiss="alert">&times;</a></div>';
    }
    elseif($_GET['alert']=='deleted')
    {
        $alertMessage = '<div class="alert alert-success">CLIENT DELETED <a class="close" data-dismiss="alert">&times;</a></div>';
    }
}

//close the mysql connection
mysqli_close($conn);


include('includes/header.php');
?>

<h1>Client Enquiries</h1>

<?php echo $alertMessage; ?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Company</th>
        <th>Notes</th>
        <th>Edit</th>
    </tr>

    <?php
        if(mysqli_num_rows($result)>0)
        {
            //we have data 
            //output adata
            while($row = mysqli_fetch_assoc($result))
            {
                echo " <tr> ";

                echo "<td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['company']."</td><td>".$row['notes']."</td>";

                echo '<td> <a href="edit.php?id=' .$row['id']. ' "type="button" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-edit">  </span> </a> </td>';


                echo " </tr> ";
            }


        }
        else
        {
            echo '<div class="alert alert-warning">you have no clients </div>';

        }

mysqli_close($conn);        
    ?>
    
    <!--
    <tr>
        <td>John Doe</td>
        <td>john@doe.com</td>
        <td>(123) 456-7890</td>
        <td>111 Address Street, Calgary, AB  T1G 2KY</td>
        <td>Brightside Studios Inc.</td>
        <td>Usually pays early. He's awesome.</td>
        <td><a href="edit.php" type="button" class="btn btn-default btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
    </tr>
    <tr>
        <td>Jane Doe</td>
        <td>jane@doe.com</td>
        <td>(123) 456-7890</td>
        <td>12a Address Avenue, Calgary, AB  T1G 2KY</td>
        <td>Brightside Studios Inc.</td>
        <td>Nice lady. Pays in high fives though...</td>
        <td><a href="edit.php" type="button" class="btn btn-default btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
    </tr>
    -->

    <tr>
        <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
    </tr>
</table>

<?php
include('includes/footer.php');
?>