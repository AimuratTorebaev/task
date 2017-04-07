<?php

/**
 * Класс User - модель для работы с пользователями (админ)
 */
class User {
    
    
    /**
     * Проверяем существует ли пользователь с заданными $login и $password
     * @param string $login <p>Login</p>
     * @param string $password <p>Password</p>
     * @return mixed : integer user id or false
     */
     public static function checkUserData($login, $password){
         
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }
    
    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId){
        
        $_SESSION['user'] = $userId;
    }
    
    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        
       header("Location: /admin/login");
    }
    
     /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
     /**
     * Проверяет является ли пользователь админом
     * @return boolean <p>Результат выполнения метода</p>
     */
     public static function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }
    
    /**
     * Возвращает пользователя с указанным id (админ)
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }
}

