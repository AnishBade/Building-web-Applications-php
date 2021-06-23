<?php
require_once "pdo.php";
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
    <head>
    </head>
    <body>

        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php
                $stmt=$pdo->query("select name,email,password from users");
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo $row['name'] ;
                    echo "</td><td>";
                    echo $row['email'] ;
                    echo "</td><td>";
                    echo $row['password']."</td></tr>";
        
                }

            ?>
        </table>
        <p>Add A New User</p>
        <form action="" method="post">
            <p>Name: <input type="text" name="name" size="40"></p>
            <p>Email: <input type="email" name="email"></p>
            <p>Password: <input type="password" name="password"></p>
            <p><input type="submit" value="Add Now"></p>

        </form>
    </body>
</html>