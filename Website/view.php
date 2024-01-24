<?php include "db_conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View imgage</title>
</head>
<body>
    <a href="index.php">&#8592;</a>
    <?php
        $sq = "SELECT *  FROM images ORDER BY id DESC";  
        $res = mysqli_query($conn, $sq);
        
        if(mysqli_num_rows($res) > 0){
            while ($images = mysqli_fetch_assoc($res)){    ?>
            <div class="alb">
                <img src="Uploads/<?=$images['img_dir']?>">
                <p><?=$images['name']?></p>
            </div>
    <?php    }
        }  ?>
</body>
</html>