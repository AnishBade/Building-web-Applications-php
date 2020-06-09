
<?php

require_once 'pdo.php';

session_start();



if ( ! isset($_SESSION['name']) ) {

	die("ACCESS DENIED");

}



/*try 

{

    $pdo = new PDO("mysql:host=localhost;dbname=coursera_building_database_applications_in_php", "root", "root");

    // set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e)

{

    echo "Connection failed: " . $e->getMessage();

    die();

}

*/

if (isset($_REQUEST['autos_id']))

{

    $auto_id = htmlentities($_REQUEST['autos_id']);



    if (isset($_POST['delete'])) 

    {

        $stmt = $pdo->prepare("

            DELETE FROM autos

            WHERE autos_id = :auto_id

        ");



        $stmt->execute([

            ':auto_id' => $auto_id, 

        ]);



        $_SESSION['success'] = 'Record deleted';




        header('Location: index.php');

        return;

    }



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

    



            <p>

                Confirm: Deleting <?php echo htmlentities($auto['make']); ?>

            </p>



            <form method="post" class="form-horizontal">


                    

                        <input class="btn btn-primary" type="submit" name="delete" value="Delete">

                        <a class="btn btn-default" href="index.php">Cancel</a>

                


            </form>




    </body>

</html>



