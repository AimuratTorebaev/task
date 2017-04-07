<?php

/**
 *  Контроллер AdminController
 */

class AdminController
{
    /**
     * Контроллер для стартовой страницы "Админ панель"
     */
    
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
       $userId = User::checkLogged();
      
   
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        
        require_once(ROOT.'/views/admin/index.php');

        return true;
    }  
    /**
     * Action для входа на сайт как админ
     */
    public function actionLogin()
    {   
        $login = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
            
            
            /*
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
            */
            $userId = User::checkUserData($login, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                
                // Перенаправляем пользователя в закрытую часть - админ панель
                header("Location: /admin/"); 
            }
            
        }
       require_once(ROOT . '/views/admin/login.php');
       return true;
    } 
    
    /**
     * Action для выхода 
     */
    public function actionLogout()
    {
        
        unset($_SESSION["user"]);
        header("Location: /");
    }
    
  
}