<?php 
session_start();
$message=false;
if(isset($_POST['guess'])){
    $guess=$_POST['guess']+0;
    $_SESSION['guess']=$guess;
    if($guess>42){
        $_SESSION['message']='your guess is higher<br>';
    }
    else if($guess==42){
        $_SESSION['message']='Congrats!!Your guess is correct!<br>';
    }
    else{
        $_SESSION['message']='your guess is lower<br>';
    }
    header('Location:POST_Redirect_1.php');
    return;
}
?>
<html>
<head><title>Guessing Game</title></head>
<body>

<?php 
$guess=isset($_SESSION['guess'])?$_SESSION['guess']:'';
$message=isset($_SESSION['message'])?$_SESSION['message']:false;
?>
<h1>Guessing Game</h1><br>
<?php 
    if($message!==false){
        echo $message;
    }
?>
<form method="post">
    <label>Guess a number<input type="number" name="guess"></label>
    <p><input type="submit" name="submit" value="Submit"></p>
</form>
</body>
</html>