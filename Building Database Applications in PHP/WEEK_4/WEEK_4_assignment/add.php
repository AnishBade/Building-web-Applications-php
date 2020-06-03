<?php
require_once 'pdo.php';
session_start();
$_SESSION['failure']=false;
if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']))
{
    if(strlen($_POST['make'])<1){
        $_SESSION['failure']= "Make is required";
    }  
    else if(is_numeric($_POST['year']) && is_numeric($_POST['mileage']))
    {
        $_SESSION['success']='Record inserted';
        $sql="INSERT INTO autos(make,year,mileage) VALUES(:mk,:y,:mil)";
        echo "<pre>\n".$sql."\n</pre>\n";
        //$stmt=$pdo->query($sql);
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ':mk'=>$_POST['make'],
            ':y'=>$_POST['year'],
            ':mil'=>$_POST['mileage']));

        header('Location:view.php');
    }
    else{
        $_SESSION['failure']= "Mileage and year must be numeric.<br>";
        
    }
}

/*if (isset($_POST['auto_id']) && isset($_POST['delete'])){
    $sql="DELETE FROM autos WHERE auto_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':zip'=>$_POST['auto_id']));

}*/

?>


<html>
<head>
    <title>Anish Bade</title>
</head>
<body>
<?php
       /* <table border='1'>
            <tr><th>
            auto_id
            </th><th>
            Make
            </th><th>
            Year
            </th><th>
            Mileage
            </th><th>
            More option
            </th></tr>
            <?php
            $stmt=$pdo->query("select make,year,mileage,auto_id from autos");
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>";
                echo $row['auto_id'];
                echo "</td><td>";
                echo htmlentities($row['make']);
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
        */
        ?>
        <?php
echo "<h1>".'Tracking Autos for '.$_SESSION['username']."</h1>";
?>
       <?php
       if($_SESSION['failure']!==false) {
        echo "<p style='color:red '>".$_SESSION['failure']."</p>";
       }
       ?>   
    
    <form method="post">
        <p>Make:<input type="text" name="make" size="40" ></p>
        <p>Year:<input type="text" name="year"  ></p>
        <p>Mileage:<input type="text" name="mileage"></p>
        <p><input type="submit" value="Add" ></p>
       
</form>



</body>