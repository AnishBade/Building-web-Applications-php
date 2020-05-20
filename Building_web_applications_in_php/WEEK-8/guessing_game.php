<?php 
        $oldguess='';
        $message=false;
        if (isset($_POST['guess'])){
            $oldguess=$_POST['guess']+0; //+0 just to convert into number
            if($oldguess==42){
                $message="Great job!";
            }
            else if($oldguess<42){
                $message="Too low";
            }
            else if($oldguess>42){
                $message="Too High";
            }
        }
?>
<html>
    <head>
        <title>A Guessing Game</title>
    </head>
    <body style="font-family:sans-serifs">
        <p>Guessing Game...</p>
        <?php 
            if($message !== false){
                echo "<p>$message</p>\n";

            }
        ?>
        <form method="post">
            <p>
                <label for="guess">Input Guess</label>
                <input type="text" name="guess" id="guess" size="40"
                    value="<?= htmlentities($oldguess)?>">
            </p>
            <input type="submit" value="Check">
        </form>
    </body>
</html>

