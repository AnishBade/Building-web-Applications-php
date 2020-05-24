<?php 
if(!$_GET['name']){
    die("Name parameter missing");
}
require_once "pdo.php";
$oldname = isset($_POST['make']) ? $_POST['make'] : '';
if(isset($_POST['logout'])){
    header('Location: index.php');
}

if(isset($_POST['make'])&& isset($_POST['year']) && isset($_POST['mileage']))
{
    $sql="insert into autos(make,year,mileage) values(:make,:year,:mileage)";
    echo "<pre>\n".$sql."\n</pre>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':make'=>$_POST['make'],
        ':year'=>$_POST['year'],
        ':mileage'=>$_POST['mileage']));
    
}

if (isset($_POST['auto_id']) && isset($_POST['delete'])){
    $sql="delete from autos where auto_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':zip'=>$_POST['auto_id']));

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
            echo "auto_id";
            echo "</th><th>";
            echo "Make";
            echo "</th><th>";
            echo "Year";
            echo"</th><th>";
            echo "Mileage";
            echo"</th><th>";
            echo "More option";
            echo "</th></tr>";
            $stmt=$pdo->query("select make,year,mileage,auto_id from autos");
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>";
                echo $row['auto_id'];
                echo "</td><td>";
                echo $row['make'];
                echo "</td><td>";
                echo $row['year'];
                echo "</td><td>";
                echo $row['mileage'];
                echo "</td><td>";
                echo "<form method='post'><input type='hidden' name='auto_id'";
                echo 'value='. $row['auto_id'].'>';
                echo "<input type='submit'
                    value='Delete' name='delete'>\n";
                echo "</form></tr>";
            }
            echo "</table>";
        ?>
  
    <p>Add A New User</p>
    <form method="post">
        <p>Make:<input type="text" name="make" size="40" value="<?= htmlentities($oldname)?>" ></p>
        <p>Year:<input type="text" name="year"  ></p>
        <p>Mileage:<input type="text" name="mileage"></p>
        <p><input type="submit" value="Add" ></p>
       <p> <input type="submit" value="Logout" name="logout"></p>
</form>



</body>