<?php


//include constants.php file here
include('../config/constants.php'); 

//1. get the ID of admin to be deleted
$id = $_GET['id'];

//2. Create sql query to delete admin
 $sql = "DELETE FROM tbl_admin WHERE id=$id";


 //Execute the query
 $res = mysqli_query($conn, $sql);

 //check whether the query executed successfully or not
 if($res==true)
 {
    //Query Executed Successfully and admin Deleted  
    //echo "Admin Deleted";
    //Create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else
 {
     //Failed to delete admin
    // echo "Failed to delete Admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

 }

//3. Redirect to manage admin page with message (success/error)

?>