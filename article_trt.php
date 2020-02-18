<?php require "assest/db.php"; ?>
<?php 

$trt_type = $_GET['type'];

if ($conn) {

    if($trt_type === "delete"){
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
    
        header("refresh:1, url='article.php'");

        
    }else if($trt_type === "update"){
        $article_id = $_GET['id'];
        echo "update";

        




    }else if($trt_type === "insert"){
        
        echo "insert";

    }


}else {
    echo 'Error: ' . $e->getMessage();
}





?>