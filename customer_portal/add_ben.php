<!DOCTYPE html>
<html lang="en">
<?php include "../includes/head.php"; ?>
<body>
 <div class="container">
     <?php 
     
        if(isset($_GET['customer_id'])) {
            
            $get_customer_id = $_GET['customer_id'];
            
        }
     
            
            
            if(isset($_POST['add_ben'])) {
                
                //put input names into variables
                $add_beneficiary = $_POST['add_beneficiary'];
                
                //insert query
                $query = "UPDATE customers set beneficiary = '{$add_beneficiary}' WHERE customer_id = {$get_customer_id} ";
                
                //send query
                $insert_ben = mysqli_query($connection, $query);
                
                //check query
                if(!$insert_ben) {
                    die('ERROR:' . mysqli_error($connection));
                }
                
                
               
                
                
                
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
     
     <!-- FORM -->
     <form action="" method="post" class="m-auto text-center p-2">
       <h2 class="text-capitalize display-4 font-weight-bold">add beneficiary</h2>
        <div class="form-group">
            <input type="text" name="add_beneficiary" id="" class="rounded">
        </div>
        <button type="submit" name="add_ben" class="btn btn-primary shadow">Submit</button>
         
     </form>
 </div>
  
<?php include "../includes/footer.php"; ?>  
</body>
</html>