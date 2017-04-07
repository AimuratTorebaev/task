<?php

/**
 *  Контроллер ItemController
 */
class ItemController {
    
    /**
    *  Action для просмотра задачи
    */
    public function actionView($id){
        
        $taskItem = Task::getTaskItemByID($id);
        require_once(ROOT . '/views/site/view.php');
        
        return true;
    }
    
  
    
}
