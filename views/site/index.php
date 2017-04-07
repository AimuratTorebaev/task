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
	   
	            <div>
                        <ul class="nav navbar-nav">                                    
                            <?php if (User::isGuest()): ?>                                        
                                <li><a href="/admin/login/"><i class="fa fa-lock"></i> Вход</a></li>
                            <?php else: ?>
                                <li><a href="/admin/"><i class="fa fa-user"></i> Админ панель</a></li>                                    
                                <li><a href="/admin/logout/"><i class="fa fa-unlock"></i> Выйти</a></li>                                        
                            <?php endif; ?>
                        </ul>
                    </div>
                
	   
		<div id="add-param"><a href="/task/add">Добавить задачу</a></div> 
		
		<div id="select1">
			<form action="#" method="post">
				<select name="item">
					<option value=1 selected>По имени</option>
					<option value=2>По email</option>
					<option value=3>По статусу</option>
				</select>
				<input type="submit" name="submit" class="btn btn-default" value="Сортировка" />
			</form>
		</div>
	
		<div id="table1">
			<table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Задача</th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>				 
			    
				  <?php foreach ($tasks as $task): ?>
					<tr>
						<td class="left-column"><img src="<?php echo Task::getImage($task['id']); ?>" alt="" /></td>
						<td><?php echo $task['name'];?></td>
						<td><?php echo $task['email'];?></td>
						<td><?php echo $task['text'];?></td>
						<td><?php echo Task::getStatusTask($task['status']);?> </td>
						<td><a href="/item/<?php echo $task['id'];?>">Посмотреть</a>
						<?php if (User::isAdmin()): ?>
						<a href="/change/<?php echo $task['id']; ?>">Изменить</a>
						<?php endif;?>
						</td>
					</tr>
				   <?php endforeach; ?>
			    </tbody>
                        </table>
		</div>
    </div>

</body>
</html>