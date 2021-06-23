<?php 
// md5 hash of php123 79f4aa48f104233adaa285416fd59007
require_once 'pdo.php';
$failure=false;
$stored_hash='1a52e17fa899cf40fb04cfc42e6352f1';
$salt='XyZzy12*_';
if(isset($_POST['who']) && isset($_POST['password'])){
    if(strlen($_POST['who'])>0 && strlen($_POST['password'])>0){
        if(!strpos($_POST['who'],'@')){
            $failure='Username(who) must contain @ ';
            // header("Location:login.php");
        }else{
            $check=hash('md5',$salt.$_POST['password']);
            if($stored_hash==$check){
                error_log("LOGIN SUCCEED.".$_POST['who']);
                header("Location:autos.php?name=".urlencode($_POST['who']));
                return;
            }else{
                $failure='Incorrect Password'; 
                error_log("LOGIN FAILED".$_POST['who'].$check);           }
        }
    
    }else{
        $failure='Username and Password must be inserted';
    }

}

?>


<html>
<head><title>Anish Bade</title></head>
<body>
    <h1>Please Log In </h1>
    <p style='color:red'><?php echo ($failure)?></p>
    <form action="" method="post">
        <p>User Name <input type="text" name="who"></p>
        <p>Password <input type="password" name="password" id=""></p>
        <p><input type="submit"  value="Login"></p>
    </form>
</body>
</html>