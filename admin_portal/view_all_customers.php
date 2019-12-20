<!doctype html>
<html lang="en">
  <?php include "../includes/head.php" ?>
  <body id="page-top">
    <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
    <?php include "../includes/sidebar.php"; ?>
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "../includes/topbar.php"; ?>
        <!-- End of Topbar -->
        

        <!-- Begin Page Content -->
        <div class="container">
         
         <?php 
            
            //select customers table
            $query = "SELECT * FROM customers";
            
            //send query
            $select_customers = mysqli_query($connection, $query);
            
            //check query connection
            if(!$select_customers) {
                echo "QUERY FAILED:" . mysqli_error($connection);
            }
            
            //loop bring in table values
            while($row = mysqli_fetch_assoc($select_customers)) {
                
                //bring table values into variables
                $customer_id = $row['customer_id'];
                $customer_name = $row['name'];
                $account_number = $row['account_number'];
                $beneficiary = $row['beneficiary'];
                $checking_account = $row['checking_account'];
                $saving_account = $row['saving_account'];
                $registration_date = $row['registration_date'];
                $customer_image = $row['customer_image'];
                
             
            ?>
               
                
              <!-- Customer Information Card -->
          <div class="row mb-2">
             <div class="card shadow m-auto p-3">
                <img style="width:500px; height:500px;" src="../images/<?php echo $customer_image; ?>" alt="" class="card-img-top img-responsive">
                <div class="card-body">
                    <h5 class="card-title text-capitalize text-center"><?php echo $customer_name;?></h5>
                    <p class="font-weight-bold"><span class="p-1">Enrollment Date:</span> <?php echo $registration_date;?></p>
                    <p class="font-weight-bold" ><span class="p-1">Account Number:</span><?php echo $account_number;?></p>
                    <p class="font-weight-bold"><span class="p-1">Checking:</span>&#36;<?php echo $checking_account;?>  </p>
                    <p class="font-weight-bold"><span class="p-1">Savings:</span>&#36;<?php echo $saving_account;?></p>
                    <p class="font-weight-bold" ><span class="p-1">Beneficiary:</span><?php echo $beneficiary;?></p>
                </div>
                <div class="d-flex">
                  <a href="edit_customer.php?source=edit_information&customer_id=<?php echo  $customer_id ?>"><button type="submit" class="btn btn-info text-uppercase mr-2 rounded">edit information</button></a> 
                   
                    <a href="view_all_customers.php?delete=<?php echo $customer_id;?>"><button  type="submit" class="btn btn-danger text-uppercase">delete customer</button></a> 
                </div>
              </div>
          </div>   
               
        <?php } ?>
         
         <?php
            
            //Delete function
            if(isset($_GET['delete'])) {
               
                //grab get query and put into variable
                $delete_customer_id = $_GET['delete'];
                
                //delete query
                $query = "DELETE FROM customers WHERE customer_id= {$delete_customer_id}";
                $delete_query = mysqli_query($connection, $query);
                header("Location: view_all_customers.php");
            }
            
            
          ?>
          
        </div>
        <!-- /.container -->

     </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include "../includes/footer.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Logout Modal-->
  <?php include "../includes/logout_modal.php"; ?>

  <!-- Logout Modal-->
  <?php include "../includes/dependencies.php"; ?>

   
  </body>
</html>