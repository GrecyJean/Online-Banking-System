<!doctype html>
<html lang="en">
  <?php include "../includes/head.php" ?>
  <body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "../includes/sidebar.php" ?>
   
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "../includes/topbar.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <?php 
             //select applications table
             $query = "SELECT * FROM card_application";
                
            //send query
            $select_applications = mysqli_query($connection, $query);
            
            //check query
             //check query connection
            if(!$select_applications) {
                echo "QUERY FAILED:" . mysqli_error($connection);
            }
    
           //loop bring in values
           while($row = mysqli_fetch_assoc($select_applications)) {
               $id = $row['id'];
               $name = $row['name'];
               $credit_score = $row['credit_score'];
               $status = $row['status'];
           
            
            
            ?>
        
          <!-- Content Row -->
          <div class="row">
            <table class="table table-bordered">
                <thead>
                   <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Credit Score</th>
                        <th scope="col">Status</th>
                   </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $name ?></td>
                        <td><?php echo $credit_score ?></td>
                        <td>
                            <select name="" id="">
                                <option value="value" class="text-success">Approve</option>
                                <option value="value" class="text-danger">Deny</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            
          </div>
          
          <?php } ?>

          <!-- Content Row -->

         

            <!-- Pie Chart -->
            
         

          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->

     
       </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include  "../includes/footer.php" ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Logout Modal-->
  <?php include "../includes/logout_modal.php" ?>

   
   <!-- Dependencies -->
   <?php include "../includes/dependencies.php" ?>
  </body>
</html>