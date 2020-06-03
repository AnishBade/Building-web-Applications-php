<?php 
require_once 'pdo.php';
session_start();

/*if(!$_GET['name']){
    die("Name parameter missing");
}

$oldname = isset($_POST['make']) ? $_POST['make'] : '';

if(isset($_POST['logout'])){
    header('Location:index.php');
}
if(isset($_POST['add'])){
    header('Location:add.php');
}
*/
?>
<html>
<head><title>Anish Bade</title></head>
<body>
<?php
echo "<h1>".'Tracking Autos for '.$_SESSION['username']."</h1>";
if(isset($_SESSION['success'])){
echo "<p style='color:green'>".htmlentities($_SESSION['success'])."</p>";
unset($_SESSION['success']);
}
?>
<br>
<h2>Automobiles</h2>


<ul >
    <?php 
    
    $stmt=$pdo->query("select auto_id,make,year,mileage from autos");
     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo '<li>';
    echo htmlentities($row['year'])." ".htmlentities($row['make'])." / ".htmlentities($row['mileage']);
    echo '</li>';
     }

    ?>
    
</ul>
<form method="post">
    <a href="add.php" name="add" style='text-decoration:none'>Add New</a>
   |
     <a href="index.php" name="logout" style='text-decoration:none'>Logout</a>
</form>
</body>
</html>
