<?php require "db.php"; ?>
<?php

// Get id & type from header
$id = $_GET['id'];
$type = $_GET['type'];

if ($conn) {
    switch ($type) {
        case "article":
            delete($conn, $type, $id, "article.php");
            break;
        case "category":
            delete($conn, $type, $id, "categories.php");
            break;
        case "author":
            delete($conn, $type, $id, "author.php");
            break;
        default:
            break;
    }
} else {
    echo 'Error: ' . $e->getMessage();
}


function delete($conn, $table, $id, $goto)
{

    $col = $table . "_id";

    try {
        // sql to delete a record
        $sql = "DELETE FROM $table WHERE $col = $id";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "$table Deleted Successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    header("Location: ../$goto", true, 301);
    exit;
}
?>