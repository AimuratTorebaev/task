<?php

/**
 *  Контроллер ChangeController
 */
class ChangeController {
    
    /**
    *  Action для страницы "Изменить запись"
    */
    public function actionView($id){
        
       $userId = User::checkLogged();
       $task = Task::getTaskItemByID($id);
       
       $text = $task['text'];
       $status = $task['status'];
        
        
       
       if (isset($_POST['submit'])) {
            
           $text = $_POST['text'];
           $status = $_POST['status'];
                    
            $id = Task::edit($id, $text, $status);
               
            header("Location: /");        
        }
        
        require_once(ROOT . '/views/admin/view.php');
        
        return true;
    }
}
