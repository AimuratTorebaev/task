<?php

/**
 *  Контроллер TaskController
 */
class TaskController {
    
    /**
    *  Action для страницы "Добавить запись"
    */
    public function actionAdd(){
        $name = '';
        $email = '';
        $text = '';
          
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
               
        $id = NewTask::addTask($name, $email, $text);
        if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/{$id}.jpg");
                    }
                };
                header("Location: /");
        }
        
       require_once(ROOT.'/views/task/add.php');
       
       return true;
        
    }
}
