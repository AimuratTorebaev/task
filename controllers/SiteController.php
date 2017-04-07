<?php

class SiteController
{
    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        
        $tasks = array();
        
        if (isset($_POST['submit'])) {
            
        $item = $_POST['item'];  
        
        }
        $tasks = Task::getTaskList($item);
        require_once(ROOT.'/views/site/index.php');

        return true;
    }
    

}
