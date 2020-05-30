<?php
session_start();

if(isset($_POST['name']) && isset($_POST['password'])){
    unset($_SESSION['name']); //Logout Current user
    if($_POST['name']=='anish' && $_POST['password']=='bade'){
        $_SESSION['name']=$_POST['name'];
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
else{
    $_SESSION['error']='Enter Name and Password';
    header('Location:login.php');
    return;
}

?>
<html>
<head><title>Anish</title></head>
<body>
<h1 style=color:blue>Please Login</h1>;
<?php
if(isset($_SESSION['error'])){
echo "<h1 style=color:red>".htmlentities($_SESSION['error'])."</h1>"; 
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    echo "<h1 style=color:green>".htmlentities($_SESSION['success'])."</h1>"; 
    unset($_SESSION['success']);
    }
?>
<form method="post">
    <label>Name: <input type="text" name="name"></label>
    <br>
    <label>Password: <input type="password" name="password"></label>
    <br>
    <input type="submit" name="Submit">
</form>
</body>
</html>