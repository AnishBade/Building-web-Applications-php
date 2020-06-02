<?php
session_start();

if(isset($_POST['nam']) && isset($_POST['pass'])){
    unset($_SESSION['nam']); //Logout Current user
    if($_POST['pass']=='bade'){
        $_SESSION['nam']=$_POST['nam'];
        $_SESSION['success']='Logged in';
        header('Location:app.php');
        return;
    }
    else{
        $_SESSION['error']='Incorrect Password';
        header('Location:login.php');   
        return;
    }

}

?>
<html>
<head><title>Anish</title></head>
<body>
<h1 style=color:blue>Please Login</h1>
<?php
if(isset($_SESSION['error'])){
echo "<p style='color:red'>".$_SESSION['error']."</p>"; 
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    echo "<p style='color:green'>".$_SESSION['success']."</p>";
    
    unset($_SESSION['success']); 
    }
  
?>
<form method="post">
    <label>Name: <input type="text" name="nam"></label>
    <br>
    <label>Password: <input type="password" name="pass"></label>
    <br>
    <input type="submit" value="Submit">
    <a href="app.php">Cancel</a>
</form>
</body>
</html>