<?php require "db.php"; ?>
<?php 

    // Get article id from header
    $category_id = $_GET['id'];

    try {
        // sql to delete a record
        $sql = "DELETE FROM category WHERE category_id = $category_id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Category Deleted Successfully";

    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    header("refresh:1, url='../allCategories.php'");
?>