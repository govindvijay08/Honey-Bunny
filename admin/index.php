<?php include('partials/menu.php')  ?>

          <!---Main Content Section starts--->
          <div class="main-content">
          <div class="wrapper">
           <h1>Dashboard</h1>
           <br><br>

           <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>

            <div class="col-4 text-center">

            <?php
                //sql Query
                $sql = "SELECT * FROM tbl_category";
                //execute query
                $res = mysqli_query($conn, $sql);
                //count rows
                $coumt = mysqli_num_rows($res);
            ?>
                <h1><?php echo $coumt; ?></h1>
                <br  />
                Categories
            </div>

            <div class="col-4 text-center">

            <?php
                //sql Query
                $sql2 = "SELECT * FROM tbl_food";
                //execute query
                $res2 = mysqli_query($conn, $sql2);
                //count rows
                $coumt2 = mysqli_num_rows($res2);
            ?>
                <h1><?php echo $coumt2; ?></h1>
                <br  />
                Foods
            </div>

            <div class="col-4 text-center">

            <?php
                //sql Query
                $sql3 = "SELECT * FROM tbl_order";
                //execute query
                $res3 = mysqli_query($conn, $sql3);
                //count rows
                $coumt3 = mysqli_num_rows($res3);
            ?>
                <h1><?php echo $coumt3; ?></h1>
                <br  />
                Total Orders
            </div>

            <div class="col-4 text-center">

            <?php
            
            //create sql query to get total revenue generated
            //aggregate function in sql
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='delivered'";

            //execute the query
            $res4 = mysqli_query($conn, $sql4);

            //get the value
            $row4 = mysqli_fetch_assoc($res4);

            //get the total revenue
            $total_revenue = $row4['Total'];
            ?>
                <h1>Rs.<?php echo $total_revenue; ?></h1>
                <br  />
                Revenue Generated
            </div>
            <div class="clearfix"></div>
</div>
        </div>
         <!---Main Content Section Ends--->

        <?php include('partials/footer.php') ?>