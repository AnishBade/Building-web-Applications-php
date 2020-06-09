<?php
require_once 'pdo.php';
session_start();

if ( ! isset($_SESSION['name']) ) {

	die("ACCESS DENIED");

}
// If the user requested logout go back to index.php

if ( isset($_POST['cancel']) ) {

    header('Location: index.php');

    return;

}
$name = htmlentities($_SESSION['name']);

if (isset($_REQUEST['autos_id']))

{
// Check to see if we have some POST data, if we do process it

	if (isset($_POST['mileage']) && isset($_POST['year']) && isset($_POST['make']) && isset($_POST['model'])) 

	{

	    if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1)

	    {

	        $_SESSION['error'] = "All fields are required";

	        header("Location: edit.php?autos_id=" . htmlentities($_REQUEST['autos_id']));

	        return;

	    }



	    if (!is_numeric($_POST['year']) ) 

	    {

	        $_SESSION['error'] = "Year must be an integer";

	        header("Location: edit.php?autos_id=" . htmlentities($_REQUEST['autos_id']));

			return;

	    } 



	    if ( !is_numeric($_POST['mileage'])) 

	    {

	        $_SESSION['error'] = "Mileage must be an integer";

	        header("Location: edit.php?autos_id=" . htmlentities($_REQUEST['autos_id']));

	        return;

	    } 



	    $make = htmlentities($_POST['make']);

	    $model = htmlentities($_POST['model']);

	    $year = htmlentities($_POST['year']);

	    $mileage = htmlentities($_POST['mileage']);



    	$auto_id = htmlentities($_REQUEST['autos_id']);



	    $stmt = $pdo->prepare("

	    	UPDATE autos

	    	SET make = :make, model = :model, year = :year, mileage = :mileage

		    WHERE autos_id = :auto_id

	    ");



	    $stmt->execute([

	        ':make' => $make, 

	        ':model' => $model, 

	        ':year' => $year,

	        ':mileage' => $mileage,

	        ':auto_id' => $auto_id,

	    ]);



	    $_SESSION['success'] = 'Record edited';

	  



	    header('Location: index.php');

		return;

	}





	$auto_id = htmlentities($_REQUEST['autos_id']);



	$stmt = $pdo->prepare("

	    SELECT * FROM autos 

	    WHERE autos_id = :auto_id

	");



	$stmt->execute([

	    ':auto_id' => $auto_id, 

	]);



	$auto = $stmt->fetch(PDO::FETCH_ASSOC);



}



?>

<!DOCTYPE html>

<html>

    <head>

        <title>Anish Bade</title>

        
    </head>

    <body>

       

            <h1>Editing Automobile</h1>

            <?php

                if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}


            ?>

            <form method="post" >

               

                    <label  for="make">Make:</label>
                        <input  type="text" name="make" id="make" value="<?php echo htmlentities($auto['make']); ?>">
<br>
                    <label  for="model">Model:</label>
                    <input  type="text" name="model" id="model" value="<?php echo htmlentities($auto['model']); ?>">
<br>

                    <label for="year">Year:</label>
                        <input type="text" name="year" id="year" value="<?php echo htmlentities($auto['year']); ?>">
<br>
                <label for="mileage">Mileage:</label>
                        <input  type="text" name="mileage" id="mileage" value="<?php echo htmlentities($auto['mileage']); ?>">
<br>
                        <input  type="submit" value="Save">

                        <input  type="submit" name="cancel" value="Cancel">

            </form>



      
    </body>

</html>