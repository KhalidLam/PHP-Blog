<?php require "db.php"; ?>
<?php 

    // Get article id from header
    $autheur_id = $_GET['id'];

    try {
        // sql to delete a record
        $sql = "DELETE FROM autheur WHERE autheur_id = $autheur_id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Autheur Deleted Successfully";

    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    header("refresh:1, url='../autheur.php'");
?>