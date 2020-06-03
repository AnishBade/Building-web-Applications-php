<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=misc',
    'anish','bade');
    //see the errors folder for  details...
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
/*try{
$pdo = new PDO('mysql:host=127.0.0.1;dbname=users;charset=utf8', 'anish', 'bade',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Error connecting to database');
}*/
?>