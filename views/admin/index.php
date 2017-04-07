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
       
        <div class="shop-menu">
                                <ul class="main-page">                                    
                                  <li><a href="/" > Главная страница</a></li>
                                    <?php if (User::isGuest()): ?>                                        
                                        <li><a href="/admin/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                    <?php else: ?>                                    
                                        <li><a href="/admin/logout/"><i class="fa fa-unlock"></i> Выход</a></li>                                        
                                    <?php endif; ?>
                                </ul>
        </div>
        <div class="cont-1">
            <p>  Добрый день, <?php echo $user['login']; ?></h3></p>
            <p>  Теперь Вы можете редактировать <a href="/">записи</a></p>
        </div>
      </div>
</body>
</html>