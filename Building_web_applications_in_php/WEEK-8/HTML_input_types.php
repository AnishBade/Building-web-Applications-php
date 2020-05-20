<p>Many field types...</p>
<form method="post" action="">
    <p>
        <label for="inp01">Account:</label>
        <input type="text" name="account" id="inp01" size="40">
    </p>
    <p>
        <label for="inp02">Password:</label>
        <input type="password" name="pw" id="inp02" size="40">
    </p>
    <p>
        <label for="inp03">Nick name:</label>
        <input type="text" name="nick" id="inp03" size="40">
    </p>
    <p>
        Preferred time:<br>
        <input type="radio" name="when" value="am" >AM<br>
        <input type="radio" name="when" value="pm"  checked>PM<br>
        
    </p>
    <p>
        Classes taken:<br>
        <input type="checkbox" name="class1" value="si502" checked >
        SI502-Networked Tech<br>
        <input type="checkbox" name="class2" value="si503"  >
        SI539-App Engineer<br>
        <input type="checkbox" name="class3" value="si504" >
        SI504-JAVA<br>

        
    </p>
    <p>
        <label for="inp06">Which soda?</label>
        <select name="soda" id="inp06">
            <option value="">--Please Select---</option>
            <option value="1">Coke</option>
            <option value="2">orange juice</option>
            <option value="3">pepsi</option>
            <option value="4">mountain dew</option>
            <option value="5">lemonade</option>
            <option value="6">fanta</option>
        </select>
    </p>
    <p>
        <label for="inp07">Which snack?</label>
        <select name="snack" id="inp07">
            <option values="">--Please select----</option>
            <option values="chips">Chips</option>
            <option values="peanut">Peanut</option>
            <option values="cookie">Cookie</option>
        </select>
    </p>
    <p>
        <label for="inp08">Tell us about yourself:</label><br>
        <textarea rows="10" cols="40" id="inp08" name="about">
            I love building websites in PHP and MYSQL.
        </textarea>
    </p>
    <p>
        <label for="inp09">Which are awesome?</label><br>
        <select multiple="multiple" name="code[]" id="inp09">
            <option values="python">PYTHON</option>
            
            <option values="css">CSS</option>
            <option values="html">HTML</option>
            <option values="php">PHP</option>
        </select>  
    </p>
    <p>
        <input type="submit"  value="Submit">
        <input type="button"
        onclick=""
        value="Escape">
    </p>

</form>

<pre>
    $_POST:
    <?php
        print_r($_POST);
    ?>
</pre>