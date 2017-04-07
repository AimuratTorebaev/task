<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/style.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        
    </head>
<body>
 <div id = "wrapper">
    <div class="container">
        <div class="main-page"><a href="/" > Главная страница</a></div>
        <h3>Изменить запись</h3>
        <?php if($result): ?>
          <p>Данные отредактированы</p>
        <?php endif;?>
     <form action="#" method="post" enctype="multipart/form-data">
      
            <div class="form-group">
                <label for="usr">Имя: <?php echo $task['name'];?></label>
            </div>
  
            <div class="form-group">
                <label for="email">Email: <?php echo $task['email'];?></label>
            </div>
            <div>
                <p><strong>Картинка: </strong></p>
                <p><img src="<?php echo Task::getImage($task['id']); ?>"</p> 
            </div>
  
            <div class="form-group">
              <label for="comment">Текст: <?php echo $text;?></label>
              <textarea name="text" class="form-control" rows="5" id="comment"></textarea>
            </div>
      
            <div>
              <label class="radio">
              <input type="checkbox" name="status" name="optionsRadios" id="optionsRadios1" value="1">
               Выполнено
              </label>
            </div>
      
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" class="btn btn-default" value="Изменить" />
      </div>
    </div>
  </form>
</div>
</div>
</body>
</html>


