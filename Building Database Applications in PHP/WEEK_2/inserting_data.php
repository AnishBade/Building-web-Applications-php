<?php 
require_once "pdo.php";
$oldname = isset($_POST['name']) ? $_POST['name'] : '';

if(isset($_POST['name'])&& isset($_POST['email']) && isset($_POST['password']))
{
    $sql="insert into users(name,email,password) values(:nam,:emai,:passwor)";
    echo "<pre>\n".$sql."\n</pre>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':nam'=>$_POST['name'],
        ':emai'=>$_POST['email'],
        ':passwor'=>$_POST['password']));
    
}

if (isset($_POST['user_id']) && isset($_POST['delete'])){
    $sql="delete from users where user_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':zip'=>$_POST['user_id']));

}

?>


<html>
<head>
    <title>Try</title>
</head>
<body>

        <?php
            echo "<table border='1'>";
            echo "<tr><th>";
            echo "user_id";
            echo "</th><th>";
            echo "Name";
            echo "</th><th>";
            echo "Email";
            echo"</th><th>";
            echo "Password";
            echo"</th><th>";
            echo "More option";
            echo "</th></tr>";
            $stmt=$pdo->query("select name,email,password,user_id from users");
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>";
                echo $row['user_id'];
                echo "</td><td>";
                echo $row['name'];
                echo "</td><td>";
                echo $row['email'];
                echo "</td><td>";
                echo $row['password'];
                echo "</td><td>";
                echo "<form method='post'><input type='hidden' name='user_id'";
                echo 'value='. $row['user_id'].'>';
                echo "<input type='submit'
                    value='Delete' name='delete'>\n";
                echo "</form></tr>";
            }
            echo "</table>";
        ?>
  
    <p>Add A New User</p>
    <form method="post">
        <p>Name:<input type="text" name="name" size="40" value="<?= htmlentities($oldname)?>" ></p>
        <p>Email:<input type="email" name="email"  ></p>
        <p>Password:<input type="password" name="password"></p>
        <p><input type="submit" value="Add" ></p>
</form>
</body>