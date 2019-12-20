<?php include "../includes/head.php"; ?>


<?php

if(isset($_POST['login'])) {

 $username = $_POST['user_name'];
 $password = $_POST['password'];
    
 $username = mysqli_real_escape_string($connection, $username);
 $password = mysqli_real_escape_string($connection, $password);
    
 //query
 $query = "SELECT * FROM customers WHERE username = '{$username}'";
    
 $select_user_query = mysqli_query($connection, $query);
   
//select user
if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }
    
//bring in database values
while($row = mysqli_fetch_array($select_user_query)) {
    $db_id = $row['customer_id'];
    $db_name = $row['name'];
    $db_username = $row['username'];
    $db_password = $row['password'];
}
    
    
if($username !==  $db_username && $password !==  $db_password) {
    header("Location: login.php");

} else if($username ==  $db_username && $password ==  $db_password) {
    header("Location: index.php?customer_id={$db_id}");
    
}

                                                     
 
    





}

    
    
    
    
    

?>