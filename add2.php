<?php


//connect to db
include('includes/connection.php');
include('includes/functions.php');

//if add button was pressed
if(isset($_POST['add']))
{
    //set all var to empty by default
    $clientName=$clientEmail=$clientPhone=$clientAddress=$clientCompany=$clientNotes="";

    //check if inputs are mepty
    //create var with form data
    //wrap data with our functions
    if(!$_POST["clientName"])
    {
        $nameError="please enter name <br>";
    }
    else
    {
        $clientName = validateFormData($_POST["clientName"]);
    }

    if(!$_POST["clientEmail"])
    {
        $emailError="please enter Email <br>";
    }
    else
    {
        $clientEmail = validateFormData($_POST["clientEmail"]);
    }

    $clientPhone= validateFormData($_POST["clientPhone"]);
    $clientAddress= validateFormData($_POST["clientAddress"]);
    $clientCompany= validateFormData($_POST["clientCompany"]);
    $clientNotes= validateFormData($_POST["clientNotes"]);

    //if required fields have data 
    if($clientName && $clientEmail)
    {
        //create query
        $query="INSERT INTO clients VALUES(NULL,'$clientName','$clientEmail','$clientPhone','$clientAddress','$clientCompany','$clientNotes',CURRENT_TIMESTAMP)";

        $result= mysqli_query($conn,$query);

        //if query was successful
        if($result)
        {
            //refresh page with query string
            header("Location: frontboot.html");

        }
        else
        {
            //something wrong
             echo "ERROR : ".$query."<br>".mysqli_error($conn);
        }


    }

}

mysqli_close($conn);




include('includes/header.php');
?>

<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Name *</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"></textarea>
    </div>
    <div class="col-sm-12">
            <a href="frontboot.html" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Client</button>
    </div>
</form>

<?php
include('includes/footer.php');
?>