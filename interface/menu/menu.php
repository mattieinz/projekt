<?php 
    require './database/connect.php';
    $connect = new Database();
    $data = $connect->getSavedgames();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo var_dump($data);
    ?>     
</body>
</html>