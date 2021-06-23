<?php
require_once 'pdo.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $sql="insert into users(name,email,password) values(:name,:email,:password)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':name'=>$_POST['name'],
        ':email'=>$_POST['email'],
        ':password'=>$_POST['password']
    ));
}
?>


<html>
<head></head>
<body>
    <p>Add A New User</p>
    <form action="" method="post">
        <p>Name: <input type="text" name="name" size="40"></p>
        <p>Email: <input type="text" name="email"></p>
        <p>Password: <input type="password" name="password" id=""></p>
        <p><input type="submit" value="Add New"></p>
    </form>

</body>
</html>