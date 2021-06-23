<?php
require_once "pdo.php";


if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $sql="insert into users (name,email,password) values(:name,:email,:password)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':name'=>$_POST['name'],
        ':email'=>$_POST['email'],
        ':password'=>$_POST['password']
    ));
}elseif(isset($_POST['user_id'])){
    $sql="delete from users where user_id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':id'=>$_POST['user_id']
    ));
}

?>

<html>
<head></head>

<body>
    <table border="2">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <tr>
            <?php
                $sql="select * from users";
                $stmt=$pdo->query($sql);
                
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo $row['name']."</td><td>";
                    echo $row['email']."</td><td>";
                    echo $row['password']."</td><td>";;
                    echo('<form method="post"><input type="hidden" ');
                    echo('name="user_id" value="'.$row['user_id'].'">'."\n");
                    echo('<input type="submit" value="Del" name="delete">');
                    echo "\n</form>\n"."</td><tr>";    
                    
                }
            ?> 
        </tr>
    </table>
    
    <p>Add New User</p>
    <form action="" method="post">
        <p>Name: <input type="text"  name="name" id=""></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Password: <input type="password" name="password"></p>
        <p><input type="submit" value="Add New"></p>
    </form>
</body>
</html>