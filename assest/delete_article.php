<?php require "db.php"; ?>
<?php 

    // Get article id from header
    $article_id = $_GET['id'];

    try {
        // sql to delete a record
        $sql = "DELETE FROM article WHERE article_id = $article_id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Article Deleted Successfully";

    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    header("refresh:1, url='../article.php'");
?>