<h1>COOL APPLICATION</h1>
<?php
if(isset($_SESSION['success'])){
    echo "<p style='color:green'>".$_SESSION['success']."</p>";
   unset($_SESSION['success']);
   
}
if(! isset($_SESSION['nam'])){
       echo "Please"."<a href='login.php'>Login</a>"."to your account<br>";

}
else{
    
echo "Please"."<a href='logout.php'>Logout</a>"."When You are done<br>";  

}
?>
