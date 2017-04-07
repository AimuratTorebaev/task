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
              <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
              <?php endif; ?>
                    <form action="#" method="post" class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Login:</label>
                        <div class="col-sm-10">
                          <input type="text" name="login" class="form-control" id="usr" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">          
                          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                      </div>

                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" name="submit" class="btn btn-default" value="Войти" />
                        </div>
                      </div>
                    </form>
            </div>
</div>
</body>
</html>
