<?php 
require_once "pdo.php";
$stmt=$pdo->query("select artist_id,name from artist");
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
                echo "<tr><td>";
                echo $row['artist_id'];
                echo "</td><td>";
                echo htmlentities($row['name']);
                echo "</td><tr>";
?>