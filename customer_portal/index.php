<!DOCTYPE html>
<html lang="en">
<?php include "../includes/head.php"; ?>
<body>
<div class="container">
   <?php 
    
    //put get request into variable
    if(isset($_GET['customer_id'])) {
     $get_customer_id = $_GET['customer_id'];
    
    }
    
    //select all from database query
    $query = "SELECT * FROM customers WHERE customer_id = {$get_customer_id}";
    
    //send query
    $select_customers = mysqli_query($connection, $query);
    
    //check query
    if(!$select_customers) {
        die('ERROR:' . mysqli_error($connection));
    }
    
    //while loop bring in customer table values
    while($row = mysqli_fetch_assoc($select_customers)){
        $customer_id = $row['customer_id'];
        $name = $row['name'];
        $username = $row['username'];
        $account_number = $row['account_number'];
        $beneficiary = $row['beneficiary'];
        $checking_account = $row['checking_account'];
        $saving_account = $row['saving_account'];
        $pin = $row['pin'];
        $password = $row['password'];
        $registration_date = $row['registration_date']; 
        $customer_image = $row['customer_image'];

    
    }
    
    
    
      
    ?>
    <header>
    <div class="d-flex justify-content-around">
    <h1 class="display-4">MapSo<i class="fas fa-piggy-bank p-3 text-danger"></i>Community Bank</h1>
    <h2 class="p-4"><a href="#" class="text-capitalize font-weight-bold text-danger">sign out</a></h2>
    </div>
 </header>
 <nav class="p-3">
     <ul class="nav d-flex justify-content-around font-weight-bold">
        <li>
            <a href="index.php?customer_id=<?php echo $customer_id;?>" class="text-capitalize p-3">account</a>
        </li>
        <li>
            <a href="atm.php?customer_id=<?php echo $customer_id; ?>" class="text-capitalize p-3">atm simulator</a>
        </li>
        <li>
            <a href="apply_card.php?customer_id=<?php echo $customer_id;?>" class="text-capitalize p-3">apply for a credit card</a>
        </li> 
     </ul>
 </nav>
 <hr>
 <main class="p-3">
    <p>Hello, <span class="p-1"><?php echo $name ?></span></p>
     <div class="card text-center shadow p-5">
        <h5 class="card-heading p-2">Checking Balance:<span class="p-2">&#36;</span><?php echo $checking_account ?></h5> 
         <h5 class="card-heading p-2">Saving Balance:<span class="p-2">&#36;</span><?php echo $saving_account ?></h5>
         <a href="add_ben.php?add_ben&customer_id=<?php echo $customer_id ?>" class="text-capitalize font-weight-bold">add beneficiary</a>
     </div>
 </main>
 <footer class="p-3">
    <!-- Footer -->
      <?php include "../includes/footer.php"; ?>
    <!-- End of Footer -->
 </footer>
</div>


 
 
  <!--Dependencies-->
  <?php include "../includes/dependencies.php"; ?>
  
  

</body>
</html>