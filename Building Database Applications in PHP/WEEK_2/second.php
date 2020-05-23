<?php
require_once "pdo.php";
echo "<pre>";
$stmt=$pdo->query("select *from Users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<table border='1'>";
        echo "<tr><td>";
        //echo "<td>$row['user_id']</td>";
        echo ($row['name']);
        echo("</td><td>");
        echo ($row['email']);
        echo("</td><td>");
        echo ($row['password']);
        echo "</td></tr>";
    echo "</table>";
}
echo "</pre>\n";
?>