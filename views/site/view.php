<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Информация</title>
        <link href="/template/css/style.css" rel="stylesheet">
    </head>
<body>
    <div id = "wrapper">
         <div class="main-page"><a href="/" > Главная страница</a></div>
        <h3>Информация</h3>
        <div id="item">
            <p><strong>Имя:</strong> <?php echo $taskItem['name'];?>   
                <strong>Email: <?php echo $taskItem['email'];?></strong></p> 
                   
        </div>
        
        <div id="img-info">
            <img src="<?php echo Task::getImage($taskItem['id']); ?>" alt="" />
        </div>
        
        <div id="item-2">
            <p><strong>Задача:</strong> <?php echo $taskItem['text'];?></p>
            <p><strong>Статус:</strong> <?php if($taskItem['status'])
                                echo 'Выполнено';
                            else 
                                echo 'Не выполнено';?>   </p>              
        </div>
        
    </div>        
</body>
</html>