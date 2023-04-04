<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    $thema_light = '';
    if (isset($_COOKIE['thema']) || user_info('thema') == 'light' ) { 
        $thema_light = 'thema_light';
    }
?>
<body class = "<?= $thema_light ?>">

    <header class="header">
        <div class="container">
            <div class="logo">TodoList</div>
            <div class="header_buttons">
                <div class="thema">
                    <div class="thema_button"></div>    
                </div>
                <a href="/handlers/exit.php" class="button" 
                    <?php 
                        if (!isset($_COOKIE['user'])) {
                            echo 'style="visibility:hidden"';
                        }
                    ?>
                >Выход</a>
            </div>
        </div>
    </header>