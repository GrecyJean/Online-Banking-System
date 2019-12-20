<!DOCTYPE html>
<html lang="en">
<?php include "../includes/head.php"; ?>
<body>
 <?php 
    
    session_start();
    
    if(isset($_POST['apply_card'])) {
        
        $_SESSION['message'] = "Application Processing!";
        $_SESSION['msg_type'] = "success";
        
        //put input names into variables
        $name_card = $_POST['name_card'];
        $credit_score = $_POST['credit_score'];
        
        //insert query statement
        $query = "INSERT INTO card_application(name, credit_score)";
        
        $query .= "VALUES('{$name_card}', '{$credit_score}')";
        
        //send query
        $create_application = mysqli_query($connection, $query);
        
        if(!$create_application) {
            die("ERROR:" . mysqli_error($connection));
        }
    }
    
    ?>
  <?php if(isset($_SESSION['message'])){ ?>
  
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
     <?php 
    
    echo $_SESSION['message'];
    unset($_SESSION['message']);
                                         
    ?> 
  
  </div>
  
  <?php } ?>
    
     <?php
    //select all application
    
    $status_query = "SELECT * FROM card_application";
    //send query
    $create_status = mysqli_query($connection, $status_query);
    
    if(!$create_status) {
        die("ERROR:" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($create_status)) {
        $status = $row['status'];
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
 
  <div class="container text-center">
      <form action="" method="post" class="m-auto text-center p-2">
       <h2 class="text-capitalize display-4 font-weight-bold p-3">Apply For A Visa Credit</h2>
       <img src="../images/visa.jpg" alt="" class="img-responsive shadow">
        <div class="form-group">
            <input type="text" name="name_card" placeholder="Enter Name" id="" class="rounded">
        </div>
        <div class="form-group">
            <input type="text" name="credit_score" placeholder="Enter Credit Score" id="" class="rounded">
        </div>
        <button type="submit" name="apply_card" class="btn btn-primary shadow">Submit</button>
     </form>
     <div name="request" class="font-weight-bold p-3">Thank You for Applying!</div>
  </div>
</body>
</html>