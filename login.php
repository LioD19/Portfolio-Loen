<?php
session_start();
require 'Database/MysqlDatabase.php';
require 'Table/PostTable.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="description">
            
            <p>
                <?php foreach(last() as $post): ?>

                    <p><?= $post->Extrait; ?></p>

                <?php endforeach; ?>
            </p>
    </div>
</body>
</html>
