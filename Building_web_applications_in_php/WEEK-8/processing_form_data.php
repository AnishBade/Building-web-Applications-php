<?php
    $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';
?>
<P>Guessing game...</P>
<form method="post">
    <P>
        <label for="guess">Input Guess</label>
        <input type="text" name="guess"id="guess" 
            size="40" value="<?= htmlentities($oldguess) ?>">
    </P>
    <input type="submit">
</form>

<pre>
    <?php 
        print_r($_POST)
    ?>
</pre>