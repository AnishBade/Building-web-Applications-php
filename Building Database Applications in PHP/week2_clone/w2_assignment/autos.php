<?php
require_once 'pdo.php';

$success=false;
$failure=false;
if(!isset($_GET['name'])){
    die("Name parameter missing.");
}elseif(isset($_POST['logout'])){
    header("Location:index.php");
    return;
}elseif(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
    if(strlen($_POST['make'])<1){
        $failure='Make is required';
    }elseif(is_numeric($_POST['mileage']) && is_numeric($_POST['year'])){
        $sql='insert into autos(make,year,mileage) values(:make,:year,:mileage)';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ':make'=>$_POST['make'],
            ':year'=>$_POST['year'],
            ':mileage'=>$_POST['mileage']
        ));
        $success='A row inserted successfully!!!';    
    }else{
        $failure='Mileage and Year must be numeric';
    }
}
?>

<html>
<head><title>Anish Bade</title></head>
<body>
    <h1>Tracking Autos for <?php echo($_GET['name']) ?></h1>
    <?php
        if($success){
            echo "<p style='color:green'>".$success."</p>";
        }elseif($failure){
            echo "<p style='color:red'>".$failure."</p>";
        }
    ?>
    <form action="" method="post">
        <p>Make: <input type="text" name="make" id=""></p>
        <p>Year: <input type="text" name="year"></p>
        <p>Mileage: <input type="text" name="mileage"></p>
        <p>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="logout" value="logout">
        </p>
    </form>
    <h1>Automobiles : </h1>
    <table border='2'>
        <tr>
            <th>Make</th>
            <th>Year</th>
            <th>Mileage</th>
        </tr>
            <?php
                $sql='select make,mileage,year from autos';
                $stmt=$pdo->query($sql);
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo($row['make']);
                    echo "</td><td>";
                    echo($row['year']);
                    echo "</td><td>";
                    echo($row['mileage']);
                    echo "</td></tr>";
                }
        
            ?>
    </table>
    
</body>
</html>