<h1>Welcome to the Automobiles Database</h1>


<?php
require_once "pdo.php";
session_start();

if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

if(isset($_SESSION['name'])){
  
$stmt=$pdo->query("select autos_id,make,model,year,mileage from autos");

if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
echo "<table border='1'>";
            echo "<tr><th>";
            //echo "autos_id";
            //echo "</th><th>";
            echo "Make";
            echo "</th><th>";
            echo "Model";
            echo"</th><th>";
            echo "Year";
             echo"</th><th>";
            echo "Mileage";
            echo"</th><th>";
            echo "Action";
            echo "</th></tr>";
            $stmt=$pdo->query("select autos_id,make,model,year,mileage from autos");
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>";
                echo htmlentities($row['make']);
                echo "</td><td>";
                echo htmlentities($row['model']);
                echo "</td><td>";
                echo htmlentities($row['year']);
                echo "</td><td>";
                echo htmlentities($row['mileage']);
                echo "</td><td>";
               ?>
               <a href="edit.php?autos_id=<?php echo $row['autos_id']; ?>">Edit</a> / <a href="delete.php?autos_id=<?php echo $row['autos_id']; ?>">Delete</a></td>

    
<?php
			                  
                echo "</tr>";
            }
            echo "</table>";
}else{
    echo 'No rows found<br>';
}
  echo "<p><a href='add.php' style='text-decoration:none'>"."Add New Entry"."</a></p>";
   echo "<p><a href='logout.php' style='text-decoration:none'>"."Logout"."</a></p>";
 
}
else{
    echo "<a href='login.php' style='text-decoration:none'>"."Please log in"."</a><br>";
 echo   "Attempt to"." <a href='add.php' style='text-decoration:none' >"."add"." data</a>". " without logging in</p>";
    
}
?>
<html>
<head><title>Anish Bade</title></head>
</html>