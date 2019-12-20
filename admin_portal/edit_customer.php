<!doctype html>
<html lang="en">
 <?php include "../includes/head.php";?>
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
            
            //check and put get request in a variable
            if(isset($_GET['edit_information'])) {
                $get_customer_info = $_GET['edit_information'];
            }
            
            //check and put get request in a variable
            if(isset($_GET['customer_id'])) {
                $get_customer_id = $_GET['customer_id'];
            }
            
            //select customer table information query
            $query = "SELECT * FROM customers WHERE customer_id='{$get_customer_id}' ";
            
            //send query
            $select_all_query = mysqli_query($connection, $query);
            
            //create while loop put customer values in variables
            while($row = mysqli_fetch_assoc($select_all_query)){
                $customer_id = $row["customer_id"];
                $customer_name = $row["name"];
                $customer_account_number = $row["account_number"];
                $checking_account = $row["checking_account"];
                $saving_account = $row["saving_account"];
                $pin_number = $row["pin"];
                $create_user_password = $row["password"];
                $registration_date = $row["registration_date"];
                $customer_image = $row['customer_image'];
            
            
            }
            
            
            if(isset($_POST['update_customer'])) {
                
                
               //put form inputs in variable
                $customer_name = $_POST['customer_name'];
                $customer_account_number = $_POST['customer_account_number'];
                $checking_deposit = $_POST['checking_deposit'];
                $saving_deposit = $_POST['saving_deposit'];
                $account_number = $_POST['pin_number'];
                $user_password = $_POST['create_user_password'];
                
               //insert query
                $query = "UPDATE customers SET name ='{$customer_name}', account_number = '{$customer_account_number}', checking_account = {$checking_deposit}, saving_account = {$saving_deposit}, pin = '{$account_number}', password ='{$create_user_password}' WHERE customer_id = {$get_customer_id }";
                
                //send query
                $update_customers =  mysqli_query($connection, $query);
                
                
                if(!$update_customers) {
                    echo mysqli_error($connection);
                }
                
                
                
            }
           
            
            
            
           ?>
          <!-- Add Form -->
          <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="customer_name" class="text-capitalize">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control rounded" 
                  value="<?php echo $customer_name ?>">
              </div>
              <div class="form-group">
                  <label for="customer_image">
                      <img width="100" src="../images/<?php echo $customer_image; ?> " alt="">
                  </label>
              </div>
              <div class="form-group">
                  <label for="account_number" class="text-capitalize">account #</label>
                  <input type="text" name="customer_account_number" class="form-control rounded" value="<?php echo $customer_account_number ?>">
              </div>
              <div class="form-group">
                  <label for="checking_deposit"class="text-capitalize" >checking deposit</label>
                  <input type="text" name="checking_deposit" class="form-control rounded"
                  value=" <?php echo $checking_account ?>" >
              </div>
               <div class="form-group">
                  <label for="saving_deposit"class="text-capitalize" >saving deposit</label>
                  <input type="text" name="saving_deposit" class="form-control rounded"
                  value="<?php echo $saving_account ?>">
              </div>
               <div class="form-group">
                  <label for="pin_number" class="text-capitalize">create 4-digit pin #</label>
                  <input type="password" name="pin_number" class="form-control rounded"
                 value="<?php echo $pin_number   ?>" >
              </div>
              
               <div class="form-group">
                  <label for="login" class="text-capitalize">create user login</label>
                  <input type="password" name="create_user_password" class="form-control rounded" value="<?php echo $create_user_password ?>">
              </div>
              
              <div class="text-center">
                  <button type="submit" name="update_customer" class="btn btn-primary btn-lg text-uppercase p-3 rounded">update customers</button>
              </div>
              
              
          </form>
         
          
          
        </div>
        <!-- /.container-fluid -->

     
      
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
  
  <!-- Dependencies Modal-->
  <?php include "../includes/dependencies.php"; ?>


  

  </body>
</html>