<h1>Welcome to the Automobiles Database</h1>

<?php
require_once "pdo.php";
session_start();

if(isset($_SESSION['name'])){
    echo "<p><a href='add.php' style='text-decoration:none'>"."Add New Entry"."</a></p>";
   echo "<p><a href='logout.php' style='text-decoration:none'>"."Logout"."</a></p>";
 
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
            $stmt=$pdo->query("select name,email,password,user_id from users");
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
                echo "<form method='post'><input type='hidden' name='user_id'";
                echo 'value='. $row['user_id'].'>';
                echo "<input type='submit'
                    value='Delete' name='delete'>\n";
                echo "</form></tr>";
            }
            echo "</table>";

}
else{
    echo "<a href='login.php' style='text-decoration:none'>"."Please log in"."</a><br>";
 echo   "Attempt to"." <a href='add.php' style='text-decoration:none' >"."add"." data</a>". "without logging in</p>";
    
}
?>