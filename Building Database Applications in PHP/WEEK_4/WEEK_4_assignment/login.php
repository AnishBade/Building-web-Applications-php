<?php // Do not put any HTML above this line
session_start();

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123

$_SESSION['failure'] = false;  // If we have no POST data
if(isset($_POST['cancel'])){
    header("Location: index.php");
    return;
}

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
    $_SESSION['failure'] = "Email and password are required";
        header('Location:login.php');
        return;
    }
    else {
        $check = hash('md5', $salt.$_POST['pass']);
        if(!strpos($_POST['who'],'@')){
            $_SESSION['failure']= "Email must have an at-sign (@) ";
            header('Location:login.php');
        return;
        }
        
        else if ( $check == $stored_hash ) {
            // Redirect the browser to game.php
            error_log("Login success ".$_POST['email']);
            $_SESSION['username']=$_POST['email'];
            header("Location: view.php");
            return;
        } else {
            $_SESSION['failure'] = "Incorrect password";
            error_log("Login fail ".$_POST['email']." $check");
            header('Location:login.php');
        return;
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>

<title>Anish Bade</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<p>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( $_SESSION['failure']!==false) {
    // Look closely at the use of single and double quotes
    echo "<p style='color:red'>".$_SESSION['failure']."</p>";
     unset($_SESSION['failure']);
}
?>
</p>
<form method="POST">
<label >User Name<input type="text" name="email" id="name"></label>

<br>
<label >Password<input type="text" name="pass" ></label>
<br>
<input type="submit" value="Log In">
<input type="submit" value="Cancel" name="cancel">

</form>

</div>
</body>
</html>
