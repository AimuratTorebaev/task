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
  <?php if($id):?>
        <p>Запись добавлена!</p>
  <?php else: ?> 
        <h3>Добавить запись</h3>
  <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
    
        <p> <label for="usr">Имя:</label> </p>
        <p><input type="text" name="name" class="form-con" id="usr" value="" ></p>
   
    	<p><label for="email">E-mail:</label></p>
        <p><input type="email" name="email" class="form-con" id="email" value=""></p>
        
  	<p><label for="comment" >Задача:</label></p>
        <textarea name="text" class="form-con" rows="5" id="comment" value=""></textarea>
        
        <label for="usr">Изображение:</label>
        <input type="file" name="image" placeholder="" class="img-add" value="">
        <input type="submit" name="submit" class="btn btn-default" value="Добавить" />
</div>

  </form>
    <?php endif; ?> 
        
</div>
</div>
</body>
</html>

