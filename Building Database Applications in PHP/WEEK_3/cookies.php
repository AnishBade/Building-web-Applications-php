<?php 
if(!isset($_COOKIE['anish'])){
    setcookie('anish','42',time()+3600);
    echo $_COOKIE['anish'];
    
}


?>

<pre>
<?php print_r($_COOKIE); ?>
</pre>
<p><a href="cookies.php"> Click Me!</a> or press Refresh</p>