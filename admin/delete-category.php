<?php

//include constants file
include('../config/constants.php');

//echo "delete";

//check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get the value and delete 
   // echo "Get value and delete";
   $id = $_GET['id'];
   $image_name = $_GET['image_name'];

   //remove the physical image file is available 
   if($image_name != "")
   {
       //Image is available. so remove it
       $path = "../images/category/".$image_name;
       //remove the image
       $remove = unlink($path);

       //if failed to remove image then add an error message and stop the process
       if($remove==false)
       {
           //set the session message
           $_SESSION['remove'] = "<div class='error'>Failed to Remove Category image.</div>";
           //redirect to manage category page
           header('location:'.SITEURL.'admin/manage-category.php');
           //stop the process
           die();


       }
   }

   //delete data from database
   //sql query to delete data from database
   $sql = "DELETE FROM tbl_category WHERE id=$id";

   //execute the query
   $res = mysqli_query($conn, $sql);

   //check whether the data is delete from database or not
   if($res==true)
   {
       //set success message and redirect
       $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
       //use redirect manage category
       header('location:'.SITEURL.'admin/manage-category.php');

   }
   else
   {
       //set fail message and redirect
       $_SESSION['delete'] = "<div class='error'>Failed to delete Category.</div>";
       //use redirect manage category
       header('location:'.SITEURL.'admin/manage-category.php');
   }

   
}
else
{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>