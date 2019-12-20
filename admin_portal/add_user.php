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
            
            
            if(isset($_POST['add_customer'])) {
                
                //put input names into variables
                $customer_name = $_POST["customer_name"];
                $customer_account_number = $_POST["customer_account_number"];
                $checking_deposit = $_POST["checking_deposit"];
                $saving_deposit = $_POST["saving_deposit"];
                $pin_number = $_POST["pin_number"];
                $create_user_password = $_POST["create_user_password"];
                $create_username = $_POST["create_username"];
                $registration_date = date("d-m-y");
                $customer_image = $_FILES['customer_image']['name'];
                $customer_image_temp = $_FILES['customer_image']['tmp_name'];
                
                //move uploaded file
                move_uploaded_file($customer_image_temp, "../images/$customer_image");
                
                
                //insert query statement
                
                $query = "INSERT INTO customers(name, account_number, checking_account, saving_account, pin, password, registration_date, customer_image, username)";
                
        $query .= "VALUES('{$customer_name}', '{$customer_account_number}', '{$checking_deposit}', '{$saving_deposit}', '{$pin_number}', '{$create_user_password}', now(), '{$customer_image}', '{$create_username}' )";
                
                //send query
                $create_customer = mysqli_query($connection, $query);
                
                if(!$create_customer) {
                    die("ERROR:" . mysqli_error($connection));
                }
                
                
                
            }
           
            
            
            
           ?>
          <!-- Add Form -->
          <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="customer_name" class="text-capitalize">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control rounded">
              </div>
              <div class="form-group">
                  <label for="customer_image">
                      <input type="file" name="customer_image" id="">
                  </label>
              </div>
              <div class="form-group">
                  <label for="account_number" class="text-capitalize">account #</label>
                  <input type="text" name="customer_account_number" class="form-control rounded">
              </div>
              <div class="form-group">
                  <label for="checking_deposit"class="text-capitalize" >checking deposit</label>
                  <input type="text" name="checking_deposit" class="form-control rounded">
              </div>
               <div class="form-group">
                  <label for="checking_deposit"class="text-capitalize" >saving deposit</label>
                  <input type="text" name="saving_deposit" class="form-control rounded">
              </div>
               <div class="form-group">
                  <label for="pin_number" class="text-capitalize">create 4-digit pin #</label>
                  <input type="password" name="pin_number" class="form-control rounded">
              </div>
              
              <div class="form-group">
                  <label for="username" class="text-capitalize">create username</label>
                  <input type="text" name="create_username" class="form-control rounded">
              </div>
              
               <div class="form-group">
                  <label for="login" class="text-capitalize">create user password</label>
                  <input type="password" name="create_user_password" class="form-control rounded">
              </div>
              
              <div class="text-center">
                  <button type="submit" name="add_customer" class="btn btn-primary btn-lg text-uppercase p-3 rounded">add user</button>
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