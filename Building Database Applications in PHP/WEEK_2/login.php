<?php 
require_once "pdo.php";
if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['password']))
{

    $sql = "SELECT name FROM users 
    WHERE  name=:nam AND email=:em AND password=:pw";

echo "<p>$sql</p>\n";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':nam'=>$_POST['name'],
    ':em' => $_POST['email'], 
    ':pw' => $_POST['password']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row){
        $name=$row['name'];
        echo "<h1> Login Successfull $name</h1>";
    
    }
    else{
        $name=$_POST['name'];
        echo "<h1>Login Failed<br> Try gain $name</h1>";
     
    }
    
    
 

}


?>

<html>
<head></head>
<body>
    <h1>Login to your account<h2>
    <form method="post">

        <label>Name:    <input type="text" name="name"></label>
        <label>Email:<input type="email" name="email"></label>
        <label>Password:<input type="password" name="password"></label>
        <input type="submit" value="Login"> 
    </form>
</body>
</html>
