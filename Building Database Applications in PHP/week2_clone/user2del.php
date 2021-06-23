<?php
require_once "pdo.php";
if(isset($_POST['id'])){
    $sql="delete from users where user_id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':id'=>$_POST['id']
    ));
}

?>


<html>
<head></head>
<body>
    <p>Delete A User</p>
    <form action="" method="post">
        <p>ID to Delete : <input type="text" name="id" id=""></p>
        <p><input type="submit" value="Delete"></p>
    </form>
</body>
</html>