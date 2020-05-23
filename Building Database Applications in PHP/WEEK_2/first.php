<?php
echo "<pre>\n";
require_once "pdo.php";

$stmt=$pdo->query("select *from Users");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
}
echo "</pre>\n";
?>