<?php  

include('security.php');
include('../database/db.php');
#Register Section

if(isset($_POST['Apply']))
{
    date_default_timezone_set('Asia/Kolkata');
    $dateTime = new DateTime();
    $d = $dateTime->format('Y-m-d H:i:s');  
    //echo $d;
    $email =$_SESSION['username'];
    $dateString  = $_POST['reg_deadline'];
    //print_r($_POST);
    //echo $_POST['reg_deadline'];
    $reg_deadline = new DateTime($dateString);
    //echo $reg_deadline->format('Y-m-d H:i:s');

    $refno  = $_POST['companyrefno'];

    $mysqli_query="INSERT INTO `company_applied`(`email_id`, `Ref_no`, `regtime`) VALUES ('".$_SESSION['username']."','$refno',now())";

    
    if($dateTime<$reg_deadline)
        if (($connection->query($mysqli_query) === TRUE))
        {
         echo "New record created successfully";
        } else 
        {
           echo "Error: " . $mysqli_query . "<br>" . $connection->error;
           $_SESSION['status'] = "You have already applied";
         }
         header("Location:companyFloated.php");
   
}

