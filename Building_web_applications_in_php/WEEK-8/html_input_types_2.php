<form method="post">
    Select your favourite color:
    <input type="color" name="favcolor" value="#0000ff"><br>
    Birthdays:
    <input type="date" name="bday" value="2013-09-02"><br>
    E-mail:
    <input type="email" name="email"><br>
    Quantity(between 1 and 5):
    <input type="number" name="quantity"
    min="1" max="5" required><br>
    Add your homepage:
    <input type="url" name="homepage"><br>
    <input type="submit" value="Submit">
</form>
<pre>
    <?php
        print_r($_POST)
    ?>
</pre>

