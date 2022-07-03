<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php  
        if(isset($_SESSION['add']))  //Checking whether the Session is set or not
        {
            echo $_SESSION['add'];  //Display the session message if set
            unset($_SESSION['add']);  //Remove session Message
        }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter your name">
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Your username">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
   //Process the value from Form and Save it in Database

   //check whether the submit button is clicked or not

   if(isset($_POST['submit']))
   {
       //Button Clicked
      // echo "Button Clicked";

      //1. Get the data from the form
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);  //Password Encryption with MD5

      //2. SQL Query to save the data into database
      $sql = "INSERT INTO tbl_admin SET
      full_name='$full_name',
      username='$username',
      password='$password'
      ";

    //3. Execute Query and save the data into database
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   //4. Check whether the query is Executed data is inserted or not and display appropriate message
   if($res==TRUE)
   {
       //Data Inserted
       //echo "data Inserted";
       //create a session variable to display message
       $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>"; 
       //Redirect Page to manage admin
       header("location:".SITEURL.'admin/manage-admin.php');
   }
    else
    {
        //Failed to Insert Data
        //echo "failed to insert data";
          //create a session variable to display message
       $_SESSION['add'] = "<div class='error'>Failed to add admin.</div>"; 
       //Redirect Page to add admin
       header("location:".SITEURL.'admin/add-admin.php');

    }


   }



?>